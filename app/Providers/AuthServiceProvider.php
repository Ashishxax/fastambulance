<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider
{
     
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

     
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addDays(30));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

        
    }
}
