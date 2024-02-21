<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Interfaces\BookApiInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Books;
use Google\Client as GoogleClient;
use Google\Service\Books as GoogleServiceBooks;
use Carbon\Carbon;

class GoogleApiService implements BookApiInterface
{
    private static $api_key = "AIzaSyBLc2dfj6H9tfIQQJNh0JUqxZrMiew8qB4";
    private static $api_name = "GoogleBooks";

    public static function getApiName(): String
    {
        return self::$api_name;
    }

    public static function getBooksByCategory(string $category): JsonResponse
    {
        $client = new Client(['verify' => false]);

        $url = "https://www.googleapis.com/books/v1/volumes?q=" . $category . "+subject&api_key=" . self::$api_key;

        try {
            $response = $client->request("GET", $url);
            $data = json_decode($response->getBody(), true);
            return response()->json($data["items"]);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public static function getBooksByKeyword(string $keyword): JsonResponse
    {
        $client = new Client(['verify' => false]);

        $url = "https://www.googleapis.com/books/v1/volumes?q=" . $keyword . "+intitle&api_key=" . self::$api_key;

        try {
            $response = $client->request("GET", $url);
            $data = json_decode($response->getBody(), true);
            return response()->json($data["items"]["volumeInfo"]["title"]);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}
