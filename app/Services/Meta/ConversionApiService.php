<?php

namespace App\Services\Meta;

use Illuminate\Support\Facades\Http;

class ConversionApiService
{
    public function send($eventName, array $userData = [], array $customData = [])
    {
        $pixelId = config('meta.pixel_id');

        $token = config('meta.access_token');

        $url = "https://graph.facebook.com/v23.0/{$pixelId}/events";

        $payload = [

            'data' => [[

                'event_name' => $eventName,

                'event_time' => time(),

                'action_source' => 'website',

                'user_data' => $userData,

                'custom_data' => $customData,

            ]],

        ];

        if (config('meta.test_event_code')) {
            $payload['test_event_code'] = config('meta.test_event_code');
        }

        return Http::post($url, $payload + [

            'access_token' => $token

        ]);
    }
}
