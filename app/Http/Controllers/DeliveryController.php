<?php

namespace App\Http\Controllers;

use App\Actions\Delivery\CreateDeliveryAction;
use App\Actions\Delivery\CreateDeliveryData;
use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function create()
    {
        return view('delivery.create');
    }

    public function store(DeliveryRequest $request)
    {
        $validated = $request->validated();

        $data = new CreateDeliveryData(
            first_name: $validated['first_name'],
            last_name: $validated['last_name'],
            phone: $validated['phone'],
            address: $validated['address'],
            city: $validated['city'],
            notes: $validated['notes'] ?? null
        );

        (new CreateDeliveryAction)->run($data);

        // добавить order details
        return view('order.checkout');
    }
}
