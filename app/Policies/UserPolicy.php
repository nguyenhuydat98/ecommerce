<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management');
    }

    public function view(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management');
    }
}
