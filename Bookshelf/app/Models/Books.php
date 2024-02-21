<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = ['title', 
                           'author',
                           'overview',
                           'published_date',
                           'isbn',
                           'image_url',
                           'pages',
                           'categories'];

    protected $guarded = ['id', 'created_at','updated_at'];

    public static function getAllBooks()
    {
        return self::all();
    }
}
