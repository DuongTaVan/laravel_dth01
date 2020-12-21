<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();
        $post = Post::create($data);
        return redirect()->route('admin.post.index')->with('message', 'add-success !');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.post.update', compact('post', 'categories'));
    }

    public function update(PostRequest $request, $id)
    {
        $data = $request->all();
        $category = Post::findOrFail($id);
        $category->update($data);
        return redirect()->route('admin.post.index')->with('message', 'edit-success !');
    }

    public function delete($id)
    {
        $category = Post::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'delete-success !');
    }
}
