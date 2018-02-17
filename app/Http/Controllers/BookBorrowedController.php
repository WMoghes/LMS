<?php

namespace App\Http\Controllers;

use App\BookBorrowed;
use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BookBorrowedController extends Controller
{
    public function index()
    {
        $allLists = BookBorrowed::all();
        return view('admin.books_borrowed.index', compact('allLists'));
    }

    public function borrowBook($id)
    {
        $setting = Setting::find(1);

        BookBorrowed::create([
            'from' => date_format(date_create(), 'Y-m-d'),
            'to' => date('Y-m-d', strtotime("+{$setting->limit_borrowing} day", time())),
            'status' => 'borrowing',
            'user_id' => Auth::user()->id,
            'book_id' => $id
        ]);

        return redirect()->back()->withStatus('This book has been added to your list.');
    }

    public function getMyLists()
    {
        $myLists = BookBorrowed::where('user_id', Auth::user()->id)->get();
        return view('list_books', compact('myLists'));
    }
}
