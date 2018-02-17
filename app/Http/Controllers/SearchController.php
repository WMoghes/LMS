<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function search()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('search', compact('authors', 'categories'));
    }

    public function getResult(Request $request)
    {
        session($request->all());
        $result = Book::title($request->title)
                        ->code($request->code)
                        ->author($request->author_name)
                        ->category($request->category_name)
                        ->get();

        $authors = Author::all();
        $categories = Category::all();
        return view('search', compact('result','authors', 'categories'));
    }
}
