<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        // Membuat izin
        Permission::create(['name' => 'view dashboard']);

        // Membuat peran dan menetapkan izin
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('view dashboard');

        // Memberikan peran ke pengguna
        $user = User::create([
            'name' => "Admin",
            'username' => "admin",
            'email' => "admin@local",
            'password' => Hash::make('password')
        ]);
        $user->assignRole('admin');
    }
}
