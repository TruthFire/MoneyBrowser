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
        $locale = session('locale', app()->getLocale());

        if ($locale === 'ru') {
            $allNews = News::select('created_at', 'ru_title as title', 'ru_content as content')->get();
        } else {
            $allNews = News::select('created_at', 'en_title as title', 'en_content as content')->get();
        }

        return view('dashboard.news', compact('allNews'));
    }
}
