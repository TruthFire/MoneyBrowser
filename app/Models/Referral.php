<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{

    protected $table = 'referrals';
    protected $fillable = [
        'user_id',
        'referred_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }
}
