<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveBlogRequest;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, AdminTable $adminTable): View
    {
        $table = $adminTable->paginate(
            request: $request,
            query: Blog::query(),
            searchableColumns: ['baslik', 'icerik'],
            sortableColumns: ['baslik', 'created_at', 'updated_at'],
        );

        return view('admin.bloglar.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.bloglar.create', ['blog' => new Blog]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveBlogRequest $request): RedirectResponse
    {
        Blog::query()->create($request->validated());

        return redirect()
            ->route('admin.bloglar.index')
            ->with('status', 'Blog yazısı başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Blog $blog): View
    {
        return view('admin.bloglar.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveBlogRequest $request, Blog $blog): RedirectResponse
    {
        $blog->update($request->validated());

        return redirect()
            ->route('admin.bloglar.index')
            ->with('status', 'Blog yazısı başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return redirect()
            ->route('admin.bloglar.index')
            ->with('status', 'Blog yazısı silindi.');
    }
}
