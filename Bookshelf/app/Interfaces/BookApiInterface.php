<?php

namespace App\Interfaces;
use Illuminate\Http\JsonResponse;

interface BookApiInterface {
    public static function getApiName(): String;

    public static function getBooksByCategory(string $category);
    public static function getBooksByKeyword(string $keyword);
}