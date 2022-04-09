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

            for ($i = 0; $i < random_int(4, 6); $i++) {
                $name = $book->title . " " . ($i + 1);
                $reprint_date = Carbon::now();

                $bookVersion = BookVersion::make([
                    'name' => $name,
                    'reprint_date' => $reprint_date
                ]);

                $bookVersions->push($bookVersion);
            }

            $book->bookVersions()->saveMany($bookVersions);

            // Note: book_id auto generate each for bookVersion
        });
    }
}
