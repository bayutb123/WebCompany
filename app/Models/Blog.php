<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'author',
        'content',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
}
