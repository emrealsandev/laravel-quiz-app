<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Emre Alşan',
            'email' => 'emrealsan7@gmail.com',
            'email_verified_at' => now(),
            'type' => 'admin',
            'password' => '$2y$10$bWsDlzk.0g1yUM6Ea.VodOMP.wL7R31Gg3W558mkmDUVkZAIy1mwq',
            'remember_token' => Str::random(10),
            
        ]);
        User::factory(10)->create();
    }
}
