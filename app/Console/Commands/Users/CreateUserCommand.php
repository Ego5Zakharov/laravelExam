<?php

namespace App\Console\Commands\Users;

use App\Actions\Users\CreateUserAction;
use App\Actions\Users\CreateUserData;
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

        $data = new CreateUserData(name: $name, email: $email, password: $password);

        $user = (new CreateUserAction)->run($data);

        $this->info('User created successfully.');
        return 1;
    }
}
