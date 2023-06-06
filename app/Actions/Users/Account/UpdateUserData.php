<?php

namespace App\Actions\Users\Account;

class UpdateUserData
{
    public function __construct(
        public readonly string $name,
        public readonly string|null $avatar
    )
    {
    }
}
