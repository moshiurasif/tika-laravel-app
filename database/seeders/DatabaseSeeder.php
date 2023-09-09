<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\People;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        People::factory(20)->create();

        $user = new User();
        $user->name = "Moshiur";
        $user->email = 'asif@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('123');
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
