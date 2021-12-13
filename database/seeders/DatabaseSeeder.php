<?php

namespace Database\Seeders;


use App\Models\BooksCatagory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(BookCategoryTableSeeder::class);
        $this->call(BookTableSeeder::class);



    }
}
