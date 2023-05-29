<?php

namespace App\Console\Commands\Users;

use App\Actions\Users\CreateUserAction;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'users:create';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $password = $this->ask('Password');

        $user = (new CreateUserAction)->run(
            [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ],
        );

        $this->info("User id: {$user->id}");

        return 1;
    }
}
