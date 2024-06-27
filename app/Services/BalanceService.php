<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class BalanceService {
    protected const FIRST_LEVEL_PERCENT = 0.10;  // 10%
    protected const SECOND_LEVEL_PERCENT = 0.05; // 5%
    protected const THIRD_LEVEL_PERCENT = 0.02;  // 2%

    public function addBalance(User $user, $amount, $type, $description, $withRefBonus = false): void
    {
        $user->increaseBalance($amount);
        $this->createTransaction($user, $amount, $type, $description);

        if($withRefBonus) {
            $this->processReferralBonuses($user, $amount);
        }
    }
    public function subtractBalance(User $user, $amount): void {
        if($amount < 0 || $user->getCurrentBalance() <= $amount) {
            return;
        }

        $user->decreaseBalance($amount);
        $this->createTransaction($user, -$amount, 'withdrawal', 'Balance Withdrawal');
        Log::debug('Subtracting ' . $amount . 'points from user # ' . $user->id);
    }

    private function createTransaction(User $user, $amount, $type, $description): void
    {
        Transaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => $type,
            'description' => $description
        ]);
    }

    private function processReferralBonuses(User $user, $amount): void
    {
        $firstLevelReferrer = $user->referrer;
        if ($firstLevelReferrer) {
            $this->giveReferralBonus($firstLevelReferrer, $amount, self::FIRST_LEVEL_PERCENT, $user->id);

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

    private function giveReferralBonus($user, $amount, $percent, $from): void
    {
        if ($user) {
            $bonus = $amount * $percent;
            $this->addBalance($user, $bonus, 'referral_bonus', 'Referral Bonus from user #' . $from);
        }
    }


}
