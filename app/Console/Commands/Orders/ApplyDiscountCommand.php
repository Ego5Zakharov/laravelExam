<?php

namespace App\Console\Commands\Orders;

use App\Actions\Orders\ApplyOrderDiscount;
use App\Models\Order;
use App\Support\Values\Number;
use Illuminate\Console\Command;

class ApplyDiscountCommand extends Command
{
    protected $signature = 'orders:apply_discount';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $discount = $this->ask('Discount');
        $orderId = $this->ask('OrderId');

        $order = Order::query()->findOrFail($orderId);

        (new ApplyOrderDiscount)->run($order, new Number($discount));

        $this->info('Order discount apply successfully!');
    }
}
