<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::all();
        $roles = Role::all();
        return view('blog.assignRole', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user, Role $role)
    {
        // Check if the user has the role by passing the role name as a string
        if ($user->hasRole($role->name)) {
            $user->removeRole($role->name);
        } else {
            $user->assignRole($role->name);
        }

       return redirect()->back();

    }
}

