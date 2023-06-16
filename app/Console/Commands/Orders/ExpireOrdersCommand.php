<?php

namespace App\Console\Commands\Orders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpireOrdersCommand extends Command
{
    protected $signature = 'orders:expire';

    protected $description = 'Expire unpaid orders';


    public function handle()
    {
        $expirationTime = Carbon::now()->subHours(2);

        $expiredOrders = Order::query()->where('is_paid', false)
            ->where('created_at', '<=', $expirationTime)
            ->get();

        if ($expiredOrders->isNotEmpty()) {
            foreach ($expiredOrders as $order) {
                $order->details()->delete();
                $order->products()->detach();
                $order->delivery()->delete();
                $order->delete();
            }
            $this->info('Expired orders have been deleted.');
        } else {
            $this->info('No expired orders found.');
        }
    }
}
