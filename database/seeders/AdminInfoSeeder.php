<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::first();
        Admin::first()?->assignRole($role);
        $admin = new Admin();
        $admin->name = 'Super Admin';
        $admin->email = 'superadmin@wsus.com';
        $admin->password = Hash::make('password');
        $admin->save();
        $admin->assignRole($role);
    }
}
