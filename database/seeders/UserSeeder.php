<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::query()->create([
            'name' => 'super admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'super_admin',
            'tenant_id' => 1
        ]);
    }
}
