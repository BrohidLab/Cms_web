<?php

namespace App\Http\Controllers;

use App\Services\Meta\ConversionApiService;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function whatsapp(Request $request, ConversionApiService $meta, $noWa)
    {

        $meta->send(
            'Lead',
            [
                'client_ip_address' => $request->ip(),
                'client_user_agent' => $request->userAgent(),
            ],
            [
                'content_name' => 'Klik WhatsApp',
            ]
        );

        return redirect()->away(
            'https://wa.me/' . $noWa
        );
    }
}
