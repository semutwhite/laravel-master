<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        // List Default Permission
        $permissions = Permission::$defaultPermissions;

        foreach ($permissions as $permissionName => $permissionDescription) {
            // Check whether permissions already exist, if not, create new ones
            if (! Permission::where('name', $permissionName)->exists()) {
                Permission::create([
                    'name' => $permissionName,
                    'description' => $permissionDescription,
                ]);
                $this->command->info("  Permission '{$permissionName}' has been created");
            } else {
                $this->command->info("  Permission '$permissionName' already exists");
            }
        }

        // Create roles and assign permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // Assign roles to users
        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@local',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');
    }
}
