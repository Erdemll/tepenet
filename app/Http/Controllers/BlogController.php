<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Support\BlogHtmlSanitizer;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('bloglar.index', [
            'blogs' => Blog::query()->latest()->paginate(9),
        ]);
    }

    public function show(Blog $blog, BlogHtmlSanitizer $sanitizer): View
    {
        return view('bloglar.show', [
            'blog' => $blog,
            'content' => $sanitizer->sanitize($blog->icerik),
        ]);
    }
}
