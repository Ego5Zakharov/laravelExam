<?php

namespace App\Console\Commands\Orders;

use App\Actions\Orders\CreateOrderAction;
use App\Actions\Orders\CreateOrderData;
use App\Models\Order;
use Illuminate\Console\Command;

class CreateOrderCommand extends Command
{
    protected $signature = 'orders:create';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $amount = $this->ask('Amount');

        $data = new CreateOrderData($amount);

        $order = (new CreateOrderAction)->run($data);

        $this->info('Order created successfully.');
    }
}
