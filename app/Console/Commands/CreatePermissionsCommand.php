<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Gate;

class CreatePermissionsCommand extends Command
{
    protected $signature = 'permissions:create';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $this->createPermissions();

        $this->info('Привет');

        return Command::SUCCESS;
    }

    private function createPermissions(): void
    {
        $policies = Gate::policies();

        foreach ($policies as $model => $policy) {
            $methods = $this->getPolicyMethods($policy);

            foreach ($methods as $method) {
                Permission::query()
                    ->firstOrCreate([
                        'action' => $method,
                        'model' => $model
                    ]);
            }
        }

    }

    private function getPolicyMethods($policy): array
    {
        $policy = get_class_methods($policy);

        return array_filter($policy, function (string $policy) {
            return !in_array($policy, ['denyWithStatus', 'denyAsNotFound']);
        });
    }
}
