<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('super-admin-views', function ($user) {
            if ($user->roles->slug=='super-admin'){
                return true;
            }else{
                return false;
            }
        });
        Gate::define('ambassador-views', function ($user) {
            if ($user->roles->slug=='ambassador'){
                return true;
            }else{
                return false;
            }
        });
    }
}
