<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'zerutis',
            'email' => 'zuveliukas@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $faker = Faker::create('lt_LT');
        $authors = 10;
        $publishers=10;
        $books = 100;
        foreach (range(1, $authors) as $_){
            DB::table('authors')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
            ]);
    }

    foreach (range(1, $publishers) as $_){
        DB::table('publishers')->insert([
            'title' => $faker->company(),
        ]);
}

    foreach (range(1, $books) as $_){
        DB::table('books')->insert([
            'title' => substr($faker->realText(rand(15, 50)), 0, -1),
            'isbn' => $faker->isbn13(),
            'pages' => rand(22, 666),
            'about' => $faker->realText(200, 4),
            'author_id' => rand(1, $authors),
            'publisher_id' => rand(1, $publishers),
        ]);
}
}
}