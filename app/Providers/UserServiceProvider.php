<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            'App\Repositories\UserRepository\UserRepositoryInterface',
            'App\Repositories\UserRepository\UserRepository'
        );
    }
}
