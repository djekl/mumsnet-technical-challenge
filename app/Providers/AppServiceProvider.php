<?php

namespace App\Providers;

use App\Actions\Accounts\AddTeamAccount;
use App\Actions\LookupBookIsbn;
use App\Contracts\AddsTeamAccounts;
use App\Contracts\LooksUpBookIsbn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton(
            LooksUpBookIsbn::class,
            LookupBookIsbn::class,
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::requireMorphMap();

        Model::unguard();
        Model::preventLazyLoading();
    }
}
