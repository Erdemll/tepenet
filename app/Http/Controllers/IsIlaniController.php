<?php

namespace App\Http\Controllers;

use App\Models\IsIlani;
use Illuminate\View\View;

class IsIlaniController extends Controller
{
    public function index(): View
    {
        $jobs = IsIlani::query()
            ->active()
            ->orderBy('application_deadline')
            ->orderBy('id')
            ->get();

        return view('is_ilanlari', [
            'jobs' => $jobs,
            'jobTypes' => IsIlani::typeLabels(),
        ]);
    }
}
