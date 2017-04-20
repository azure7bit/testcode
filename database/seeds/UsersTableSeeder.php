<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'    => 'firstuser',
            'email'       => 'firstuser@hotmail.com',
            'password'    => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name'    => 'test',
            'email'       => 'test@hotmail.com',
            'password'    => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name'    => 'John',
            'email'       => 'john@hotmail.com',
            'password'    => Hash::make('12345678'),
        ]);
    }
}
