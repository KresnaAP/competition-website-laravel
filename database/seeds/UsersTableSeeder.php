<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now()->addHours(7),
            'password' => Hash::make('secret'),
            'created_at' => now()->addHours(7),
            'updated_at' => now()->addHours(7)
        ]);
    }
}
