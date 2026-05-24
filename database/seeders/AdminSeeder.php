<?php

namespace Database\Seeders;

use App\Models\ModelAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelAdmin::updateOrCreate(
            [
                'admin_username' => 'admin'
            ],
            [
                'admin_nama' => 'Administrator',
                'admin_email' => 'admin@nathala.com',
                'admin_password' => Hash::make('admin123'),
                'admin_role' => 'superadmin',
                'admin_is_active' => true,
            ]
        );
    }
}