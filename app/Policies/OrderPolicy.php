<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management') || $admin->role_id == config('setting.role.admin_order');
    }

    public function view(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management') || $admin->role_id == config('setting.role.admin_order');
    }
}
