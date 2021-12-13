<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Book::factory()->count(10)->create();

            foreach(Book::all() as $book){

                Author::where('id',$book->authId)->update([ 'noOfBooksAvail'=> DB::raw('noOfBooksAvail+1'), ]);
            }
    }
}
