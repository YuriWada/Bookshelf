<?php

namespace App\Factories;

use App\Services\GoogleApiService;

class BookApiFactory {

    public static function get($apiType = null)
    {
        switch ($apiType) {
            case 'google':
                return new GoogleApiService();
            case null:
                return new GoogleApiService();
            default:
                throw new \InvalidArgumentException("Unsupported API type: $apiType");
        }
    }
}