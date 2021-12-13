<?php

namespace Database\Seeders;

use App\Models\BooksCatagory;
use Illuminate\Database\Seeder;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BooksCatagory::create([
            'catName'=>'Fantasy'
        ]);
        BooksCatagory::create([
            'catName'=>'Sci-Fi'
        ]);
        BooksCatagory::create([
            'catName'=>'Mystery'
        ]);
        BooksCatagory::create([
            'catName'=>'Thriller'
        ]);
        BooksCatagory::create([
            'catName'=>'Romance'
        ]);
        BooksCatagory::create([
            'catName'=>'Westerns'
        ]);
        BooksCatagory::create([
            'catName'=>'Dystopian'
        ]);
        BooksCatagory::create([
            'catName'=>'Contemporary'
        ]);

    }
}
