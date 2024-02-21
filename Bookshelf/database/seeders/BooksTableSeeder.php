<?php

namespace Database\Seeders;

use App\Factories\BookApiFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\GoogleApiService;
use Carbon\Carbon;
use App\Models\Books;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $category = 'computers';
        $livrosCategorias = BookApiFactory::get()->getBooksByCategory($category);
        // $livrosNomes = $googleApiService->getBooksByKeyword($keyword);

        foreach ($livrosCategorias->original as $livro) {
            $book = new Books;
            $book->id = $livro["id"] ?? null;
            $book->title = $livro["volumeInfo"]["title"] ?? null;
            if (isset($livro["volumeInfo"]["authors"]) && is_array($livro["volumeInfo"]["authors"])) {
                $book->author = implode(", ", $livro["volumeInfo"]["authors"]);    
            } else $book->author = null;
            $book->overview = $livro["volumeInfo"]["description"] ?? null;
            $book->published_date = isset($livro["volumeInfo"]["publishedDate"]) ? Carbon::parse($livro["volumeInfo"]["publishedDate"]) : null;
            $book->image_url = $livro["volumeInfo"]["imageLinks"]["thumbnail"] ?? null;
            $book->pages = $livro["volumeInfo"]["pageCount"] ?? null;
            $book->categories = implode(", ", $livro["volumeInfo"]["categories"] ?? []);

            $book->save();
        }
    }
}
