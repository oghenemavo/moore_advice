<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tester Admin',
            'email' => 'demo@gmail.com',
            'password' => Hash::make('123456Aa'),
            'email_verified_at' => now(),
        ]);
    }
}
