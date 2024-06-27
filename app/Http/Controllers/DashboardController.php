<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $referralsCount = $user?->getReferralsCount();

        return view('dashboard.index', compact('referralsCount'));
    }

    public function indexNews() {
        $allNews = News::orderBy('created_at', 'desc')->get();
        return view('dashboard.news', compact('allNews'));
    }
}
