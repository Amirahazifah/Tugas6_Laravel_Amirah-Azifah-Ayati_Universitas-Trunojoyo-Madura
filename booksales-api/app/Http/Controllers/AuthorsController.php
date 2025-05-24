<?php

namespace App\Http\Controllers;

use App\Models\AuthorsModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Pest\Laravel\json;

class AuthorsController extends Controller
{
    public function index(){
        $authors = AuthorsModel::all() ;

        if ($authors ->isEmpty()){
            return response() ->json([
                'success' => true,
                'message' => 'Resource data not found!'
            ]);
            }
        
        return response() ->json([
            "success" => true,
            "message" => "Get All Resource",
            "data"    => $authors
        ],200); 
    }
    public function store(Request $request) {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string', 
        ]);
    
        // 2. check error
        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }
    
        // 3. upload image
        $image = $request->file('photo');
        $image->store('authors', 'public');
    
        // 4. insert data
        $authors = AuthorsModel::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio,
        ]);
    
        // 5. Response
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully',
            'data' => $authors
        ], 201);
    }
    public function show (string $id){
        $authors = AuthorsModel::find($id);

        if (!$authors) {
            return response() -> json([
                'success' => false,
                'message' => 'Resource not found'
            ],404);
        }
        return response() ->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data' => $authors
        ],200);
    }
    public function update(Request $request,string $id) {
        // 1. Cari data
        $authors = AuthorsModel::find($id);
        
        if (!$authors) {
            return response() ->json([
                'success' => false,
                'message' => 'Resource data not found!',
                'data' => null
            ],404);
        }

        // 2. validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string', 
        ]);

        // 3.cek data yang error
        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }
        // 3. upload image
        $image = $request->file('photo');
        $image->store('books', 'public');

        // 4. simpan data 
        $authors ->update([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio,
        ]);

        // 5. response berhasil
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully',
            'data' => $authors
        ], 200);
    }
    public function destroy(string $id){
        $authors = AuthorsModel::find($id);
    
        if (!$authors) {
            return response()->json([
                'success' => false,
                'message' => 'Resource data not found!',
                'data' => null
            ], 404);
        }
    
        if ($authors->photo) {
            \Storage::disk('public')->delete('authors/' . $authors->photo);
        }
    
        $authors->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Resource deleted successfully'
        ], 200);
    }
}
