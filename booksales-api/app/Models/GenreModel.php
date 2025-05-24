<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreModel extends Model
{
    protected $table = 'genres';

    public static function getGenres()
    {
        return self::all();
    }

    protected $fillable = [
        'name',
        'description',
    ];
}
