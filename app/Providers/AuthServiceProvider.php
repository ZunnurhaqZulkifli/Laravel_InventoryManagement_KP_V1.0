<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App/User' => ""
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();


        Gate::define('sales.all', function ($user) {
            return $user->is_admin;
        });

        Gate::define('products.stats', function ($user) {
            return $user->is_admin;
        });

        Gate::define('products.edit', function ($user) {
            return $user->is_admin;
        });

        Gate::define('variation.create', function ($user) {
            return $user->is_admin;
        });

        Gate::define('brands.create', function ($user) {
            return $user->is_admin;
        });

        Gate::define('categories.create', function ($user) {
            return $user->is_admin;
        });

        Gate::define('users.show', function ($user) {
            return $user->is_admin;
        });

        Gate::define('users.edit', function ($user) {
            return $user->is_admin;
        });

        Gate::define('users.index', function ($user) {
            return $user->is_admin;
        });

        Gate::before(function($user, $ability) {
            if ($user->is_admin && in_array($ability, ['update', 'delete', 'view'])) {
                return true;
            }
        });
    }
}
