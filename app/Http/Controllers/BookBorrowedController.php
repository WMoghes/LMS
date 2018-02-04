<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BookBorrowedController extends Controller
{
    public function index()
    {
        return view('admin.books_borrowed.index');
    }
}
