<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole = Role::where('name', 'Admin')->where('guard_name', 'web')->first();
        if (!$adminRole) {
            $admin = Role::create(['name' => 'Admin']);
            $editor = Role::create(['name' => 'Editor']);
            $reader = Role::create(['name' => 'Reader']);

            $createPost = Permission::create(['name' => 'create post']);
            $editPost = Permission::create(['name' => 'edit post']);
            $deletePost = Permission::create(['name' => 'delete post']);
            $viewPost = Permission::create(['name' => 'view post']);

            $admin->givePermissionTo($createPost, $editPost, $deletePost, $viewPost);
            $editor->givePermissionTo($createPost, $editPost, $viewPost);
            $reader->givePermissionTo($viewPost);

            $user = User::find(1);
            $user->assignRole('Admin');
        } else {
            $this->command->info('Role "Admin" already exists.');
        }
    }
}



