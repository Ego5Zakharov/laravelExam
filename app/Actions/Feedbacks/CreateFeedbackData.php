<?php

namespace App\Actions\Feedbacks;

class CreateFeedbackData
{
    public function __construct(
        readonly string $comment,
        readonly string $rating,
        readonly bool $visible,
    )
    {

    }
}
