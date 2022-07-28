<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update-post', function (User $user, Product $product) {
        //     return $user->id === $product->users_id;
        // });

        //short-syntax of above ,here fn = function
        Gate::define('product-action', fn (User $user, Product $product) => ($user->id === $product->users_id  || Auth::user()->role_id == Role::$SUPER_ADMIN));
        Gate::define('super_admin-action', fn (User $user) => ($user->role_id == Role::$SUPER_ADMIN));
    }
}
