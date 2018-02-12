<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

use App\Http\Requests;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create_author');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
        ]);

        Author::create([
            'author_name' => $request->name,
            'location' => $request->location
        ]);

        return redirect()->route('author')
                ->withStatus("New author ({$request->name}) has been added successfully.");
    }

    public function remove($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'author');
        Author::findOrFail($id)->delete();
        return redirect()->route('author')->withStatus('The author has been deleted');
    }

    public function edit($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'author');
        $author = Author::findOrFail($id);
        return view('admin.authors.edit_author', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
        ]);

        CheckVariableIfNullOrEmptyRedirectTo($id, 'author');
        Author::findOrFail($id)->update([
            'author_name' => $request->name,
            'location' => $request->location
        ]);
        return redirect()->route('author')
            ->withStatus("Author ({$request->name}) has been updated successfully.");
    }
}
