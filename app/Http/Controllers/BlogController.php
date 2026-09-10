<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Support\BlogHtmlSanitizer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $search = $this->queryStringValue($request, 'search');
        $requestedSort = $this->queryStringValue($request, 'sort');
        $sorts = [
            'newest' => ['created_at', 'desc'],
            'oldest' => ['created_at', 'asc'],
            'title' => ['baslik', 'asc'],
        ];
        $sort = array_key_exists($requestedSort, $sorts) ? $requestedSort : 'newest';
        [$column, $direction] = $sorts[$sort];

        $query = Blog::query();

        if ($search !== '') {
            $query->whereAny(['baslik', 'icerik'], 'like', "%{$search}%");
        }

        return view('bloglar.index', [
            'blogs' => $query
                ->orderBy($column, $direction)
                ->orderByDesc('id')
                ->paginate(9)
                ->withQueryString(),
            'search' => $search,
            'sort' => $sort,
        ]);
    }

    private function queryStringValue(Request $request, string $key): string
    {
        $value = $request->query($key);

        return is_string($value) ? mb_substr(trim($value), 0, 100) : '';
    }

    public function show(Blog $blog, BlogHtmlSanitizer $sanitizer): View
    {
        return view('bloglar.show', [
            'blog' => $blog,
            'content' => $sanitizer->sanitize($blog->icerik),
        ]);
    }
}
