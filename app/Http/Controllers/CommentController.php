<?php

namespace App\Http\Controllers;

use App\Actions\Feedbacks\CreateFeedbackAction;
use App\Actions\Feedbacks\CreateFeedbackData;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store($productId, FeedbackRequest $request)
    {
        if (!Auth::check()) {
            flash('Для этого действия нужно войти в аккаунт', 'primary');
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

            Product::setAverageRating($productId);

            return redirect()->back();
        }

        flash('Перед комментированием необходимо приобрести выбранный товар', 'primary');
        return redirect()->back();
    }

    public function like($feedbackId)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Для этого действия нужно войти в аккаунт'], 401);
        }

        $feedback = Feedback::query()->find($feedbackId);
        if (!$feedback) {
            return response()->json(['message' => 'Отзыв не найден'], 404);
        }

        $user = Auth::user();

        $userFeedback = UserFeedback::query()
            ->where('feedback_id', $feedback->id)
            ->where('user_id', $user->id)
            ->first();

        if ($userFeedback) {
            if ($userFeedback->like === 1) {
                // Лайк уже был поставлен, ничего не меняем
                return response()->json(['message' => 'Лайк уже поставлен', 'like_count' => $feedback->like, 'dislike_count' => $feedback->dislike]);
            } elseif ($userFeedback->dislike === 1) {
                // Был поставлен дизлайк, переключаем на лайк
                $userFeedback->like = 1;
                $userFeedback->dislike = 0;
                $userFeedback->save();
                $feedback->like++;
                $feedback->dislike--;
                $message = 'Вы изменили свой голос с дизлайка на лайк';
            }
        } else {
            // Новый лайк
            $userDislike = UserFeedback::query()
                ->where('feedback_id', $feedback->id)
                ->where('user_id', $user->id)
                ->where('dislike', 1)
                ->first();

            if ($userDislike) {
                // Уже был поставлен дизлайк, ничего не меняем
                return response()->json(['message' => 'Дизлайк уже поставлен', 'like_count' => $feedback->like, 'dislike_count' => $feedback->dislike]);
            }

            UserFeedback::query()->create([
                'user_id' => $user->id,
                'feedback_id' => $feedbackId,
                'like' => 1,
                'dislike' => 0
            ]);
            $feedback->like++;
            $message = 'Лайк успешно поставлен';
        }

        $feedback->save();

        return response()->json([
            'like_count' => $feedback->like,
            'dislike_count' => $feedback->dislike,
            'message' => $message
        ]);
    }

    public function dislike($feedbackId)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Для этого действия нужно войти в аккаунт'], 401);
        }

        $feedback = Feedback::query()->find($feedbackId);
        if (!$feedback) {
            return response()->json(['message' => 'Отзыв не найден'], 404);
        }

        $user = Auth::user();

        $userFeedback = UserFeedback::query()
            ->where('feedback_id', $feedback->id)
            ->where('user_id', $user->id)
            ->first();

        if ($userFeedback) {
            if ($userFeedback->dislike === 1) {
                // Дизлайк уже был поставлен, ничего не меняем
                return response()->json(['message' => 'Дизлайк уже поставлен', 'dislike_count' => $feedback->dislike, 'like_count' => $feedback->like]);
            } elseif ($userFeedback->like === 1) {
                // Был поставлен лайк, переключаем на дизлайк
                $userFeedback->like = 0;
                $userFeedback->dislike = 1;
                $userFeedback->save();
                $feedback->like--;
                $feedback->dislike++;
                $message = 'Вы изменили свой голос с лайка на дизлайк';
            }
        } else {
            // Новый дизлайк
            $userLike = UserFeedback::query()
                ->where('feedback_id', $feedback->id)
                ->where('user_id', $user->id)
                ->where('like', 1)
                ->first();

            if ($userLike) {
                // Уже был поставлен лайк, ничего не меняем
                return response()->json(['message' => 'Лайк уже поставлен', 'dislike_count' => $feedback->dislike, 'like_count' => $feedback->like]);
            }

            UserFeedback::query()->create([
                'user_id' => $user->id,
                'feedback_id' => $feedbackId,
                'like' => 0,
                'dislike' => 1
            ]);
            $feedback->dislike++;
            $message = 'Дизлайк успешно поставлен';
        }

        $feedback->save();

        return response()->json(['message' => $message, 'dislike_count' => $feedback->dislike, 'like_count' => $feedback->like]);
    }

}
