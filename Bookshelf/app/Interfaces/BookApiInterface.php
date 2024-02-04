<?php

namespace App\Interfaces;
use Illuminate\Http\JsonResponse;

interface BookApiInterface {
    public static function getApiName(): String;

    public function searchBooks($query);
}