<?php

use App\Models\Consultation;
use Webpatser\Uuid\Uuid;

if (!function_exists('generateUuid')) {
    /**
     * @throws Exception
     */
    function generateUuid(): string
    {
        return Uuid::generate(4)->string;
    }
}

if (!function_exists('unreadConsultations')) {

    function unreadConsultations(): int
    {
        return Consultation::whereNull('read_at')->count();
    }

}
