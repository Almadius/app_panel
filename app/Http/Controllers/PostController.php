<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use App\Services\PostImageService;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;
    protected $postImageService;

    public function __construct(PostService $postService, PostImageService $postImageService)
    {
        $this->postService = $postService;
        $this->postImageService = $postImageService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $post = $this->postService->create($data);

        if ($request->has('categories')) {
            $post->categories()->sync($request->input('categories'));
        }

        if ($request->hasFile('image_path')) {
            $imageData = [
                'post_id' => $post->id,
                'image_path' => $request->file('image_path')
            ];
            $this->postImageService->create($imageData);
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->postService->update($post, $data);

        if ($request->has('categories')) {
            $post->categories()->sync($request->input('categories'));
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $this->postService->delete($post);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}


