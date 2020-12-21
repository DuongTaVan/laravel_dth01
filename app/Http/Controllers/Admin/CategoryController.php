<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {

        $data['name'] = $request->name;
        $category = Category::create($data);
        return redirect()->route('admin.category.index')->with('message', 'add-success !');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data['name'] = $request->name;
        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('admin.category.index')->with('message', 'edit-success !');;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'delete-success !');
    }
}
