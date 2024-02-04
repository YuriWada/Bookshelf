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

    public function searchBooks($query)
    {
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $query,
            'key' => self::$api_key,
        ]);

        $livros = $response->json()['items'];

        foreach ($livros as $livro) {
            Books::updateOrCreate(
                ['isbn' => $livro['id']],
                [
                    'title' => $livro['volumeInfo']['title'] ?? null,
                    'author' => implode(', ', $livro['volumeInfo']['authors'] ?? []),
                    'overview' => $livro['volumeInfo']['description'] ?? null,
                    'published_date' => isset($livro['volumeInfo']['publishedDate']) ? Carbon::parse($livro['volumeInfo']['publishedDate']) : null,
                    'isbn' => $livro['id'],
                    'image_url' => $livro['volumeInfo']['imageLinks']['thumbnail'] ?? null,
                    'pages' => $livro['volumeInfo']['pageCount'] ?? null,
                    'categories' => implode(', ', $livro['volumeInfo']['categories'] ?? []),
                ]
            );
        }

        return $livros;
    }
}
