<?php

namespace App\Http\Controllers;

use App\Support\Values\TwilioSmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected TwilioSmsService $twilio;

    public function __construct(TwilioSmsService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function sendSms(Request $request)
    {
        $to = $request->input('to');
        $message = $request->input('message');

        $this->twilio->sendSms($to, $message);

        flash('Сообщение было отправлено на ваш номер телефона', 'primary');
        return response()->json(['message' => 'SMS sent successfully']);
    }
}
