<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        User::create([
            'name'=> 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'alamat' => 'yatimmandiri',
            'telephone' => '0812768915',
            'password' => Hash::make('12345678'),
        ])->assignRole('admin');

        User::create([
            'name'=> 'guest',
            'email' => 'guest@gmail.com',
            'username' => 'guest',
            'alamat' => 'yatimmandiri',
            'telephone' => '0812768915',
            'password' => Hash::make('12345678'),
        ])->assignRole('guest');
    }
}
