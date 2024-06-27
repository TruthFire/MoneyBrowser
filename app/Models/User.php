<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
        'current_withdraw_limit',
        'daily_withdraw_limit',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referrer()
    {
        return $this->hasOneThrough(__CLASS__, Referral::class, 'user_id', 'id', 'id', 'referred_by');
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'referred_by');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getCurrentBalance()
    {
        return $this->balance;
    }

    public function getEarningsToday()
    {
        return $this->transactions()
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->whereNot('type', 'withdrawal')
            ->sum('amount');
    }

    public function getReferralEarnings()
    {
        return $this->transactions()
            ->where('type', 'referral_bonus')
            ->sum('amount');
    }

    public function getLvl1Referrals() {
        return Referral::where('referred_by', $this->id)->pluck('user_id');
    }

    public function getLvl2Referrals() {
        $firstLevelReferrals = $this->getLvl1Referrals();
        return Referral::whereIn('referred_by', $firstLevelReferrals)->pluck('user_id');
    }

    public function getLvl3Referrals() {
        $secondLevelReferrals = $this->getLvl2Referrals();
        return Referral::whereIn('referred_by', $secondLevelReferrals);
    }

    public function getReferralsCount()
    {
        $firstLevelReferrals = Referral::where('referred_by', $this->id)->pluck('user_id');
        $secondLevelReferrals = Referral::whereIn('referred_by', $firstLevelReferrals)->pluck('user_id');
        $thirdLevelReferrals = Referral::whereIn('referred_by', $secondLevelReferrals)->count();

        return [
            'first_level' => $firstLevelReferrals->count(),
            'second_level' => $secondLevelReferrals->count(),
            'third_level' => $thirdLevelReferrals,
        ];
    }

    public function increaseBalance($amount): void
    {
        if($amount < 0) {
            return;
        }

        $this->balance += $amount;
        $this->save();
    }

    public function decreaseBalance($amount): void
    {
        if($amount < 0) {
            return;
        }
        if($this->balance < $amount) {
            return;
        }

        $this->balance -= $amount;
        $this->save();
    }

}
