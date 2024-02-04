<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\GoogleApiService;
use Carbon\Carbon;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(GoogleApiService $googleApiService)
    {
        $query = 'Laravel';
        $livros = $googleApiService->searchBooks($query);

        foreach ($livros as $livro) {
            \App\Models\Books::updateOrCreate(
                ['isbn' => $livro['id']],
                [
                    'title' => $livro['volumeInfo']['title'],
                    'author' => implode(', ', $livro['volumeInfo']['authors']),
                    'overview' => $livro['volumeInfo']['description'],
                    'published_date' => isset($livro['volumeInfo']['publishedDate']) ? Carbon::parse($livro['volumeInfo']['publishedDate']) : null,
                    'isbn' => $livro['id'],
                    'image_url' => $livro['volumeInfo']['imageLinks']['thumbnail'] ?? null,
                    'pages' => $livro['volumeInfo']['pageCount'] ?? null,
                    'categories' => implode(', ', $livro['volumeInfo']['categories'] ?? []),
                ]
            );
        }
    }
}
