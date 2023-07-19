<?php

namespace App\Actions\Delivery;

use App\Models\Delivery;

class CreateDeliveryAction
{
    public function run(CreateDeliveryData $data)
    {
        return
            Delivery::query()->create([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'city' => $data->city,
                'phone' => $data->phone,
                'address' => $data->address,
                'country' => $data->country,
                'notes' => $data->notes ?? null
            ]);
    }
}
