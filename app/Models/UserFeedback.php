<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    use HasFactory;

    protected $table = 'user_feedback';

    protected $fillable = ['like', 'dislike', 'user_id', 'feedback_id'];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class, 'feedback_id');
    }

}
