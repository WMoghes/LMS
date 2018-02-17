<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\BookBorrowed;
use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'code' => 'required',
        ]);

        $inputs = $request->all();
        if ($request->hasFile('book_image')) {
            $avatar = $request->file('book_image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('uploads/images/' . $filename);
            Image::make($avatar)->resize(300, 300)->save($path);
        }

        Book::create([
           'code' => $inputs['code'],
           'title' => $inputs['title'],
           'edition' => $inputs['edition'],
           'publication' => $inputs['publication'],
           'price' => $inputs['price'],
           'quantity' => $inputs['quantity'],
           'image_name' => isset($filename) ? $filename : null,
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

        $checkBorrowed = BookBorrowed::where('book_id', $id)->get();

        if (is_null($checkBorrowed) || count($checkBorrowed) < 1)
            return redirect()->route('books')
                    ->withStatus('You cannot delete this books because it is in borrowing list');

        Book::findOrFail($id)->delete();
        return redirect()->route('books')->withStatus('The book has been deleted');
    }

    public function edit($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'books');
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.edit_book', compact('book','authors', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'code' => 'required',
        ]);

        CheckVariableIfNullOrEmptyRedirectTo($id, 'books');

        $inputs = $request->all();
        if ($request->hasFile('book_image')) {
            $avatar = $request->file('book_image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('uploads/images/' . $filename);
            Image::make($avatar)->resize(300, 300)->save($path);
        }
        $filename = isset($filename) ? $filename : null;

        if (is_null($filename)) {
            Book::findOrFail($id)->update([
                'code' => $inputs['code'],
                'title' => $inputs['title'],
                'edition' => $inputs['edition'],
                'publication' => $inputs['publication'],
                'price' => $inputs['price'],
                'quantity' => $inputs['quantity'],
                'author_id' => $inputs['author_name'],
                'description' => $inputs['description'],
                'category_id' => $inputs['category_name'],
                'status' => $inputs['status']
            ]);
        } else {
            Book::findOrFail($id)->update([
                'code' => $inputs['code'],
                'title' => $inputs['title'],
                'edition' => $inputs['edition'],
                'publication' => $inputs['publication'],
                'price' => $inputs['price'],
                'quantity' => $inputs['quantity'],
                'image_name' => $filename,
                'author_id' => $inputs['author_name'],
                'description' => $inputs['description'],
                'category_id' => $inputs['category_name'],
                'status' => $inputs['status']
            ]);
        }

        return redirect()->route('books')
            ->withStatus("Book ({$request->title}) has been updated successfully.");
    }
}
