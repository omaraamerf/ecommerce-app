<?php

namespace App\Providers;


use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    protected $policies = [
        Product::class => ProductPolicy::class,
    ];
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });
    }
}
