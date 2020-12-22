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
        $data = $request->all();
        //dd($data);
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('uploads/categories/', $filename);
            $data['image'] = 'uploads/categories/' . $filename;
        }
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
        $data = $request->all();
        $category = Category::findOrFail($id);
        if($request->hasfile('image'))
        {
            if ($category->image) {
                $old_image = $category->image;
                unlink($old_image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('uploads/categories/', $filename);
            $data['image'] = 'uploads/categories/' . $filename;
        }
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
