<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id', 'id');
    }
}
