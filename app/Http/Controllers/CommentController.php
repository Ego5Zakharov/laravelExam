<?php

namespace App\Http\Controllers;

use App\Actions\Feedbacks\CreateFeedbackAction;
use App\Actions\Feedbacks\CreateFeedbackData;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Query;

class CommentController extends Controller
{
    public function create($productId)
    {


    }

    public function store($productId, FeedbackRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        if ($user->orders()->count() === 0) {
            flash('Вы еще не приобрели ни одного товара', 'primary');
            return redirect()->back();
        }

        $userOrder = $user->orders()->where('is_paid', true)->whereHas('products', function ($query) use ($productId) {
            $query->where('products.id', $productId);
        })->get();

        $alreadyComment = Feedback::query()
            ->where('user_id', Auth::user()->id)
            ->where('product_id', $productId)
            ->get();

        if ($alreadyComment->isNotEmpty()) {
            flash('Вы уже комментировали этот товар!', 'primary');
            return redirect()->back();
        }


        if ($userOrder) {
            $validated = $request->validated();
            $data = new CreateFeedbackData(
                comment: $validated['comment'],
                rating: $validated['rating'],
                visible: $validated['visible'] ?? false
            );
            (new CreateFeedbackAction)->run($data, $productId);

            return redirect()->back();
        }
        flash('Перед комментированием необходимо приобрести выбранный товар', 'primary');
        return redirect()->back();
    }

}
