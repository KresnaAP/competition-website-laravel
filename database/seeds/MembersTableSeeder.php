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
            'name' => 'Ega',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '1',
            'name' => 'Kresna',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '1',
            'name' => 'Kiki',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '2',
            'name' => 'Ega2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '2',
            'name' => 'Kresna2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'user_id' => '2',
            'name' => 'Kiki2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
