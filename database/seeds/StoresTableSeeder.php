<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('stores')->insert([
            'name'    => 'firststore',
            'email'       => 'firststore@hotmail.com',
            'password'    => Hash::make('12345678'),
        ]);

        DB::table('stores')->insert([
            'name'    => 'storage',
            'email'       => 'storage@hotmail.com',
            'password'    => Hash::make('12345678'),
        ]);

        DB::table('stores')->insert([
            'name'    => 'merchant',
            'email'       => 'merchant@hotmail.com',
            'password'    => Hash::make('12345678'),
        ]);
    }
}
