<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];
    protected $fillable=['book_title', 'Author', 'publisher', 'published'];    
}
