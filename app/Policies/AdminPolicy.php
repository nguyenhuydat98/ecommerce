<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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

    public function create(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management');
    }

    public function update(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management');
    }

    public function delete(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management');
    }
}
