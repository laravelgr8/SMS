install nexmo package :
composer require nexmo/client

go to https://developer.vonage.com/ for api key 
API key : c5b52654
API Secret : DOx8t75BR6yAxMsz

On controller: 
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendSmsNotificaition()
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('Nexmo key', 'Nexmo secret');
        $client = new \Nexmo\Client($basic);
 
        $message = $client->message()->send([
            'to' => '9197171****',
            'from' => 'John Doe',
            'text' => 'A simple hello message sent from Vonage SMS API'
        ]);
 
        dd('SMS message has been delivered.');
    }
}



On Route: 
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('send-sms-notification', [NotificationController::class, 'sendSmsNotificaition']);
