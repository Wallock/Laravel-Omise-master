<?php

namespace wall0ck\Omise\process;

use Illuminate\Support\Facades\Http;
use wall0ck\Omise\process\Omise;

class OmiseBalance extends Omise
{
    public static function retrieve()
    {
        static::init();

            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . base64_encode(self::$secret_key),
            ])->get(self::$url . '/balance');
        return $response->json();
    }
}