<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookBorrowed extends Model
{
    protected $table = 'books_borrowed';
    protected $guarded = [];
}
