<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookBorrowed extends Model
{
    protected $table = 'books_borrowed';
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo('App\Book', 'book_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
