<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $score
 * @property string $text
 * @property integer $service_id
 * @property integer $user_id
 * @property Carbon $created_at
 * @property Carbon updated_at
 */
class Rating extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    //жалоба
    public function complaints()
    {
        return $this->morphMany(Complaint::class, 'complaintable');
    }
}
