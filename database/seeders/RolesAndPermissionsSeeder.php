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

        // Create roles
        $adminRole = Role::where('name', 'Admin')->where('guard_name', 'web')->first();
        if (!$adminRole) {
            $adminRole = Role::create(['name' => 'Admin']);
        }

        $editorRole = Role::where('name', 'Editor')->where('guard_name', 'web')->first();
        if (!$editorRole) {
            $editorRole = Role::create(['name' => 'Editor']);
        }

        $readerRole = Role::where('name', 'Reader')->where('guard_name', 'web')->first();
        if (!$readerRole) {
            $readerRole = Role::create(['name' => 'Reader']);
        }

        // Create permissions
        $createPost = Permission::where('name', 'create post')->where('guard_name', 'web')->first();
        if (!$createPost) {
            $createPost = Permission::create(['name' => 'create post']);
        }

        $editPost = Permission::where('name', 'edit post')->where('guard_name', 'web')->first();
        if (!$editPost) {
            $editPost = Permission::create(['name' => 'edit post']);
        }

        $deletePost = Permission::where('name', 'delete post')->where('guard_name', 'web')->first();
        if (!$deletePost) {
            $deletePost = Permission::create(['name' => 'delete post']);
        }

        $viewPost = Permission::where('name', 'view post')->where('guard_name', 'web')->first();
        if (!$viewPost) {
            $viewPost = Permission::create(['name' => 'view post']);
        }

        // Assign permissions to roles
        $adminRole->givePermissionTo([$createPost, $editPost, $deletePost, $viewPost]);
        $editorRole->givePermissionTo([$createPost, $editPost, $viewPost]);
        $readerRole->givePermissionTo($viewPost);

        // Create users
        $admin = User::where('email', 'admin@example.com')->first();
        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'Admin',
            ]);
        }

        $editor = User::where('email', 'editor@example.com')->first();
        if (!$editor) {
            $editor = User::create([
                'name' => 'Editor',
                'email' => 'editor@example.com',
                'password' => Hash::make('password'),
                'role' => 'Editor',
            ]);
        }

        $reader = User::where('email', 'reader@example.com')->first();
        if (!$reader) {
            $reader = User::create([
                'name' => 'Reader',
                'email' => 'reader@example.com',
                'password' => Hash::make('password'),
                'role' => 'Reader',
            ]);
        }

        // Assign roles to users
        $admin->assignRole($adminRole);
        $editor->assignRole($editorRole);
        $reader->assignRole($readerRole);

        $this->command->info('Roles and permissions seeded successfully.');
    }
}
