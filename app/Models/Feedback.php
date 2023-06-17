<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = ['rating', 'comment', 'visible', 'user_id', 'product_id'];

    protected $casts = [
        'rating' => 'integer'
        , 'visible' => 'boolean'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

}
