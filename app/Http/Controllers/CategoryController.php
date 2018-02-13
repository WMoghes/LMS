<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create_category');
    }

    public function remove($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'author');
        Category::findOrFail($id)->delete();
        return redirect()->route('categories')->withStatus('The category has been deleted');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Category::create([
            'category_name' => $request->name
        ]);

        return redirect()->route('categories')
            ->withStatus("New category ({$request->name}) has been created.");
    }
}
