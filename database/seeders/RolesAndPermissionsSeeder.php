<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

            // Assign 'Admin' role to admin user
            $admin->assignRole($adminRole);
        }

        // Create 'Editor' role if it doesn't exist
        $editorRole = Role::where('name', 'Editor')->where('guard_name', 'web')->first();
        if (!$editorRole) {
            $editorRole = Role::create(['name' => 'Editor']);
        }

        // Check if 'Editor' user exists
        $editor = User::where('email', 'editor@example.com')->first();
        if (!$editor) {
            // Create 'Editor' user
            $editor = User::create([
                'name' => 'Editor',
                'email' => 'editor@example.com',
                'password' => Hash::make('password'), // Change 'password' to the desired password
            ]);

            // Assign 'Editor' role to 'Editor' user
            $editor->assignRole($editorRole);
        }

        // Create roles and permissions if they don't exist
        if (!$adminRole) {
            $reader = Role::create(['name' => 'Reader']);

            $createPost = Permission::create(['name' => 'create post']);
            $editPost = Permission::create(['name' => 'edit post']);
            $deletePost = Permission::create(['name' => 'delete post']);
            $viewPost = Permission::create(['name' => 'view post']);

            $adminRole->givePermissionTo([$createPost, $editPost, $deletePost, $viewPost]);
            $editorRole->givePermissionTo([$createPost, $editPost, $viewPost]);
            $reader->givePermissionTo($viewPost);

            $admin->assignRole($adminRole);
            $editor->assignRole($editorRole);
        }

        // Define and assign permissions to roles if needed
        // Example: $adminRole->givePermissionTo($permission);

        $this->command->info('Roles and permissions seeded successfully.');
    }
}
