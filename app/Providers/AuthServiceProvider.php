<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
protected function registerPermissions()
{
    // Roles
    Role::create(['name' => 'admin']);
    Role::create(['name' => 'user']);

    // Permissions
    Permission::create(['name' => 'assign_roles']);
}
     protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-post', function ($user) {
            return $user->hasPermissionTo('create-post');
        });

    }
}
