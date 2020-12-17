<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function create(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management') || $admin->role_id == config('setting.role.admin_product');
    }

    public function update(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management') || $admin->role_id == config('setting.role.admin_product');
    }

    public function delete(Admin $admin)
    {
        return $admin->role_id == config('setting.role.management') || $admin->role_id == config('setting.role.admin_product');
    }
}
