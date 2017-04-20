<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'Computers & Tablets',
            'description' => 'description here'
        ]);

        DB::table('categories')->insert([
            'name' => 'Video Games',
            'description' => 'description here'
        ]);

        DB::table('categories')->insert([
            'name' => 'Transports',
            'description' => 'description here'
        ]);

        DB::table('categories')->insert([
            'name' => 'TV',
            'description' => 'description here'
        ]);

        DB::table('categories')->insert([
            'name' => 'Clothes',
            'description' => 'description here'
        ]);

        DB::table('categories')->insert([
            'name' => 'Cameras',
            'description' => 'description here'
        ]);

        DB::table('categories')->insert([
            'name' => 'Foods',
            'description' => 'description here'
        ]);
    }
}
