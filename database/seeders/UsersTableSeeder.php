<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models as Database;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

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
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);

        // factory(App\Models\User::class, 50)->create();
         User::factory()->count(50)->create();
    }
}
