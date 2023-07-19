<?php

namespace App\Support\Values;

use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class TwilioSmsService
{
    protected Client $client;


    public function __construct()
    {
        $this->client = new Client(
            config('twilio.sid'),
            config('twilio.auth_token')
        );
    }

    public function sendSms($to, $message)
    {
        $this->client->messages->create(
            $to,
            ['from' => config('twilio.phone_number'),
                'body' => $message
            ]
        );
    }
}
