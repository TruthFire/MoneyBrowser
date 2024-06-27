<?php

namespace App\Http\Controllers;

use App\Services\BalanceService;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    private $balanceService;
    public function __construct() {
        $this->balanceService = new BalanceService();
    }
    public function test() {
        $user = Auth::user();

        if($user) {
            $this->balanceService->addBalance($user, 100, 'replenishment', 'Test', true);
        }

        return redirect('/dashboard');
    }
}
