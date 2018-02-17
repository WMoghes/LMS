<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookBorrowed;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function showBook($id)
    {
        if (Auth::check()) {
            $userList = BookBorrowed::where('user_id', Auth::user()->id)
                ->where('book_id', $id)->get();
        }
        $book = Book::find($id);
        return view('show_book', compact('book', 'userList'));
    }
}
