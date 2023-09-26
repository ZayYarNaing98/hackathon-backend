<?php

namespace App\Models;

use App\Models\Profile;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'profile_id',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
