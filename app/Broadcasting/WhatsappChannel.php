<?php

namespace App\Broadcasting;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class WhatsappChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toWhatsapp')) {
            throw new \Exception('toWhatsapp method missing from notification class.');
        }

        $message = $notification->toWhatsapp($notifiable);

        return Http::asJson()
          ->withHeaders([
            'Authorization' => env('fonnte_token', '8M6@F@W7XRNa+mx8s9JM'),
          ])
          ->post('https://api.fonnte.com/send', [
            'target' => $message['number'],
            'message' => $message['data'],            
          ]);
    }        
}
