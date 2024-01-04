<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('create-hero', function ($user) {
            return $user->role_id == 2;
        });
        Gate::define('edit-hero', function ($user) {
            return $user->role_id == 2;
        });
        Gate::define('edit-user', function ($currentUser, $userToEdit) {
            return $currentUser->id === $userToEdit->id || $currentUser->role_id == 2;
        });
    }
}
