<?php

namespace App\Actions\Feedbacks;

use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CreateFeedbackAction
{
    public function run(CreateFeedbackData $data, $productId)
    {
        $product = Product::query()->find($productId);
        if ($product) {
            $feedback = new Feedback;
            $feedback->newQuery()->create([
                'rating' => $data->rating,
                'comment' => $data->comment,
                'visible' => $data->visible,
                'user_id' => Auth::user()->id,
                'product_id' => $product->id
            ]);

            flash('Спасибо за комментарий!', 'primary');
            return $feedback;
        }
        return false;
    }
}
