<?php

namespace App\Actions\Users\Account;

class UpdateUserData
{
    public function __construct(
        public string $name,
        public ?string $avatar,
        public ?string $phone
    )
    {
    }
}
