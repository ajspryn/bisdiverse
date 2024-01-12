<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'Admin@bisdiverse.com',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('roles')->insert([
            'id' => 1,
            'user_id' => 1,
            'role_id' => 0,
            'divisi_id' => 0,
            'jabatan_id' => 0,
        ]);
    }
}
