<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@email.com',
            'password' => bcrypt('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'user2@email.com',
            'password' => bcrypt('123'),
        ]);
    }
}
