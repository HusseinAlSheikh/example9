<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//    protected $table = 'posts';
//    protected $primaryKey = 'title' ;

    protected $fillable = [
        'title' , 'excerpt' , 'body' ,'image_path' , 'is_published' , 'min_to_read'
    ];

}
