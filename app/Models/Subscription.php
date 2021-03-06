<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $subscription_type
 * @property integer $subscription_id
 * @property Carbon $created_at
 * @property Carbon updated_at
 */
class Subscription extends Model
{
    protected $guarded = ['id'];

    public function subscription()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
