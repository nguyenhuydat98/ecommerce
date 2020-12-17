<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Category;
use App\Models\Voucher;
use App\Models\Supplier;
use App\Models\ProductInformation;
use App\Models\Product;
use App\Policies\UserPolicy;
use App\Policies\AdminPolicy;
use App\Policies\OrderPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\VoucherPolicy;
use App\Policies\SupplierPolicy;
use App\Policies\ProductInformationPolicy;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Admin::class => AdminPolicy::class,
        Order::class => OrderPolicy::class,
        Category::class => CategoryPolicy::class,
        Voucher::class => VoucherPolicy::class,
        Supplier::class => SupplierPolicy::class,
        ProductInformation::class => ProductInformationPolicy::class,
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
