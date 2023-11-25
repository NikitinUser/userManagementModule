<?php

namespace NikitinUser\UserManagementModule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use NikitinUser\userManagementModule\lib\Helpers\HasRoles;

class UserManagementModuleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //   
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('role', function ($role){
            return "<?php if(auth()->check() && HasRoles::hasRole(auth()->user()->id, $role)): ?>";
        });
        Blade::directive('endrole', function ($role){
            return "<?php endif; ?>";
        });

        $this->loadRoutesFrom(__DIR__.'/lib/routes.php');

        $this->publishes([
            __DIR__ . '/../config/user_management.php' => config_path('user_management.php'),
        ]);
    }
}