<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorsModel extends Model
{
    protected $table = 'authors';

    public static function getAllAuthors()
    {
        return self::all();
    }
    protected $fillable = [
        'name',
        'photo',
        'bio',
       
    ];
}
