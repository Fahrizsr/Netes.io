<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    public function run()
    {
        Akun::create([
            'username' => 'admin',
            'password' => Hash::make('123456'),
        ]);
    }
}
