<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostImageRequest;
use App\Models\PostImage;
use App\Services\PostImageService;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    protected $postImageService;

    public function __construct(PostImageService $postImageService)
    {
        $this->postImageService = $postImageService;
    }

    public function store(PostImageRequest $request)
    {
        $this->postImageService->create($request->validated());
        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function destroy(PostImage $postImage)
    {
        $this->postImageService->delete($postImage);
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
