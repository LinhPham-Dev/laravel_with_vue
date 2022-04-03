<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookVersion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::all()->each(function (Book $book) {
            $bookVersions = collect();

            for ($i = 0; $i < random_int(1, 10); $i++) {
                $name = $book->title . " " . ($i + 1);
                // $book_id = $book->id;
                $reprint_date = Carbon::now();

                $bookVersion = BookVersion::make([
                    'name' => $name,
                    // 'book_id' => $book_id,
                    'reprint_date' => $reprint_date
                ]);

                $bookVersions->push($bookVersion);
            }

            $book->bookVersions()->saveMany($bookVersions);

            // Note: book_id auto generate each for bookVersion

            // BookVersion::factory(5)
            //     ->create();
        });
    }
}
