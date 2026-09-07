<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveIsIlaniRequest;
use App\Models\IsIlani;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IsIlaniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, AdminTable $adminTable): View
    {
        $table = $adminTable->paginate(
            request: $request,
            query: IsIlani::query(),
            searchableColumns: ['title', 'summary', 'type', 'cities', 'employment_type'],
            sortableColumns: ['title', 'type', 'application_deadline', 'is_active', 'created_at'],
        );

        return view('admin.is-ilanlari.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.is-ilanlari.create', [
            'isIlani' => new IsIlani,
            'typeOptions' => IsIlani::typeLabels(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveIsIlaniRequest $request): RedirectResponse
    {
        IsIlani::query()->create($request->validated());

        return redirect()
            ->route('admin.is-ilanlari.index')
            ->with('status', 'İş ilanı başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IsIlani $isIlani): View
    {
        return view('admin.is-ilanlari.edit', [
            'isIlani' => $isIlani,
            'typeOptions' => IsIlani::typeLabels(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveIsIlaniRequest $request, IsIlani $isIlani): RedirectResponse
    {
        $isIlani->update($request->validated());

        return redirect()
            ->route('admin.is-ilanlari.index')
            ->with('status', 'İş ilanı başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IsIlani $isIlani): RedirectResponse
    {
        $isIlani->delete();

        return redirect()
            ->route('admin.is-ilanlari.index')
            ->with('status', 'İş ilanı silindi.');
    }
}
