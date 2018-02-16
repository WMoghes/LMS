<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

use App\Http\Requests;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.create_book', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        if($request->file('book_image')) {
            $inputs['image'] = uploadImage($inputs['book_image']);
        }

        Book::create([
           'code' => $inputs['code'],
           'title' => $inputs['title'],
           'edition' => $inputs['edition'],
           'publication' => $inputs['publication'],
           'price' => $inputs['price'],
           'quantity' => $inputs['quantity'],
           'image_name' => $inputs['image_name'],
           'author_id' => $inputs['author_name'],
           'description' => $inputs['description'],
           'category_id' => $inputs['category_name'],
           'status' => $inputs['status']
        ]);

        return redirect()->route('books')
            ->withStatus("New Book ({$request->title}) has been added successfully.");
    }

    public function remove($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'books');
        Book::findOrFail($id)->delete();
        return redirect()->route('book')->withStatus('The book has been deleted');
    }

    public function edit($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'books');
        $book = Book::findOrFail($id);
        return view('admin.books.edit_book', compact('book'));
    }

    public function update(Request $request)
    {

    }
}
