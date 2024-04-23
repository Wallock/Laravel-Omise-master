<?php

namespace wall0ck\Omise\process;

use wall0ck\Omise\process\Omise;
use Illuminate\Support\Facades\Http;

class OmiseSource extends Omise
{ 
    public static function create(array $data)
    {
        self::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$public_key)
        ])->post(self::$url . '/sources', $data);

        return $response->json();
    }
}