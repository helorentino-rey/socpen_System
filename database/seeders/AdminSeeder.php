<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'employee_id' => '0078',
            'password' => Hash::make('admin1234'), // Hashing the password
        ]);
    }
}
