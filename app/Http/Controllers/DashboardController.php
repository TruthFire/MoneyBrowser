<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $referralsCount = $user?->getReferralsCount();

        return view('dashboard.index', compact('referralsCount'));
    }
}
