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

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function scopeTitle($query, $type)
    {
        if (is_null($type) || empty($type))
            return $query;
        return $query->where('title', 'like', '%' . $type . '%');
    }

    public function scopeCode($query, $type)
    {
        if (is_null($type) || empty($type))
            return $query;
        return $query->where('code', '=', $type);
    }

    public function scopeAuthor($query, $type)
    {
        if (is_null($type) || empty($type))
            return $query;
        return $query->where('author_id', '=', $type);
    }

    public function scopeCategory($query, $type)
    {
        if (is_null($type) || empty($type))
            return $query;
        return $query->where('category_id', '=', $type);
    }
}
