<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $faker = \Faker\Factory::create();

        $password = Hash::make('User@123');

        User::create([
            'firstname' => 'Administrator',
            'lastname'=>'Admin',
            'email' => 'admin@test.com',
            'password' => $password,
            'role' =>'admin',
            'mobile'=>$faker->numerify('9#########'),
            'age'=>$faker->numerify('##'),
            'gender'=>$faker->randomElement(['m','f','o']),
            'city'=>$faker->city,

        ]);

        User::factory()->count(10)->create();

    }
}
