<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'user_id' => '1',
            'name' => 'ega',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '1',
            'name' => 'kresna',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '1',
            'name' => 'kiki',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '2',
            'name' => 'ega2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '2',
            'name' => 'kresna2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '2',
            'name' => 'kiki2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
