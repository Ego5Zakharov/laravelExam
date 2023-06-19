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
use MongoDB\Driver\Query;

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
            flash('Для этого действия нужно войти в аккаунт', 'primary');
            return redirect()->route('login');
        }

        $feedback = Feedback::query()->find($feedbackId);
        if (!$feedback) {
            flash('Отзыв не найден', 'danger');
            return redirect()->back();
        }

        $user = Auth::user();

        $userFeedback = UserFeedback::query()
            ->where('feedback_id', $feedback->id)
            ->where('user_id', $user->id)
            ->first();

        if ($userFeedback) {
            if ($userFeedback->like === 1) {
                // Удаление лайка
                $userFeedback->delete();
                $feedback->like--;
            } else {
                // Обновление лайка
                $userFeedback->like = 1;
                $userFeedback->dislike = 0;
                $userFeedback->save();
                $feedback->like++;
                $feedback->dislike--;
            }
        } else {
            // Создание нового лайка
            UserFeedback::query()->create([
                'user_id' => $user->id,
                'feedback_id' => $feedbackId,
                'like' => 1,
                'dislike' => 0
            ]);
            $feedback->like++;
        }

        $feedback->save();

        flash('Спасибо за вклад в сообщество!', 'success');
        return redirect()->back();
    }

    public function dislike($feedbackId)
    {
        if (!Auth::check()) {
            flash('Для этого действия нужно войти в аккаунт', 'primary');
            return redirect()->route('login');
        }

        $feedback = Feedback::query()->find($feedbackId);
        if (!$feedback) {
            flash('Отзыв не найден', 'danger');
            return redirect()->back();
        }

        $user = Auth::user();

        $userFeedback = UserFeedback::query()
            ->where('feedback_id', $feedback->id)
            ->where('user_id', $user->id)
            ->first();

        if ($userFeedback) {
            if ($userFeedback->dislike === 1) {
                // Удаление дизлайка
                $userFeedback->delete();
                $feedback->dislike--;
            } else {
                // Обновление дизлайка
                $userFeedback->like = 0;
                $userFeedback->dislike = 1;
                $userFeedback->save();
                $feedback->like--;
                $feedback->dislike++;
            }
        } else {
            // Создание нового дизлайка
            UserFeedback::query()->create([
                'user_id' => $user->id,
                'feedback_id' => $feedbackId,
                'like' => 0,
                'dislike' => 1
            ]);
            $feedback->dislike++;
        }

        $feedback->save();

        flash('Спасибо за вклад в сообщество!', 'success');
        return redirect()->back();
    }

}
