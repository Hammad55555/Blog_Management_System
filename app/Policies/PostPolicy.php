<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy

{
    /**
     * Create a new policy instance.
     *
     */

    public function __construct()
    {
        //
    }
    public function createPost(User $user)
{
    return $user->hasPermissionTo('create-post');
}

}
