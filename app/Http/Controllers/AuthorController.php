<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthorController extends Controller
{
    public function index()
    {
        return view('admin.authors.index');
    }

    public function create()
    {
        return view('admin.authors.create_author');
    }
}
