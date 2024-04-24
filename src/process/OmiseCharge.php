<?php

namespace wall0ck\Omise\process;

use wall0ck\Omise\process\Omise;
use Illuminate\Support\Facades\Http;

class OmiseCharge extends Omise
{
    public static function create(array $data)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->post(self::$url . '/charges', $data);

        return $response->json();
    }
    public static function retrieve($sourceId)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->get(self::$url . '/charges/'.$sourceId);

        return $response->json();
    }
}