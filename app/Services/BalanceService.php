<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class BalanceService {
    protected const FIRST_LEVEL_PERCENT = 0.10;  // 10%
    protected const SECOND_LEVEL_PERCENT = 0.05; // 5%
    protected const THIRD_LEVEL_PERCENT = 0.02;  // 2%

    public function addBalance(User $user, $amount)
    {
        $this->createTransaction($user, $amount, 'replenishment', 'Account Replenishment');
        Log::debug('Adding ' . $amount . 'points to user # ' . $user->id);
        $this->processReferralBonuses($user, $amount);
    }

    private function createTransaction(User $user, $amount, $type, $description)
    {
        Transaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => $type,
            'description' => $description
        ]);
        Log::debug('Transaction created');
    }

    private function processReferralBonuses(User $user, $amount)
    {
        Log::debug('Processing refs');
        $firstLevelReferrer = $user->referrer;
        if ($firstLevelReferrer) {
            $this->giveReferralBonus($firstLevelReferrer, $amount, self::FIRST_LEVEL_PERCENT, $user->id);
            Log::debug('Ref lvl1 - ' . $firstLevelReferrer->id);

            $secondLevelReferrer = $firstLevelReferrer->referrer;
            if ($secondLevelReferrer) {
                $this->giveReferralBonus($secondLevelReferrer, $amount, self::SECOND_LEVEL_PERCENT,  $user->id);

                $thirdLevelReferrer = $secondLevelReferrer->referrer;
                if ($thirdLevelReferrer) {
                    $this->giveReferralBonus($thirdLevelReferrer, $amount, self::THIRD_LEVEL_PERCENT,  $user->id);
                }
            }
        }
    }

    private function giveReferralBonus($user, $amount, $percent, $from)
    {
        if ($user) {
            $bonus = $amount * $percent;
            $this->createTransaction($user, $bonus, 'referral_bonus', 'Referral Bonus from user #' . $from);
        }
    }


}
