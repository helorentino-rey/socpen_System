<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        SuperAdmin::create([
            'employee_id' => 'R11-6730',
            'password' => Hash::make('superadmin'),
        ]);
    }
}
