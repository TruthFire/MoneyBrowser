<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class ReferralController extends Controller
{
    public function handleReferralVisit($id) {

        if(Cookie::has('ref_partner')) {
            return redirect('/');

        }
        $referrer = User::where('id', $id)->first();

        if(!$referrer) {
            return redirect('/');
        }

        Cookie::queue('ref_partner', $id, 60 * 24 * 30); // 30 days
        return redirect('/');
    }
}
