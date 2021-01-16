<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Author::factory()->count(100)->create();
        Book::factory()->count(500)->create();

        $books = Book::all();
        Author::all()->each(function ($author) use ($books){
            $author->books()->attach(
                $books->random(rand(1, 10))->pluck('id')
            );
        });
    }
}
