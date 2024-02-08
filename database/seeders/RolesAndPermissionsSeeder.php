<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create admin role if it doesn't exist
        $adminRole = Role::where('name', 'Admin')->where('guard_name', 'web')->first();
        if (!$adminRole) {
            $adminRole = Role::create(['name' => 'Admin']);
        }

        // Check if admin user exists
        $admin = User::where('email', 'admin@example.com')->first();
        if (!$admin) {
            // Create admin user
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Change 'password' to the desired password
            ]);
        }

        // Assign 'Admin' role to admin user
        $admin->assignRole($adminRole);

        // Define and assign permissions to roles if needed
        // Example: $adminRole->givePermissionTo($permission);

        $this->command->info('Roles and permissions seeded successfully.');
    }
}
