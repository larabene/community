<?php

namespace App\Providers;

use App\Profile;
use App\Slack\LegacySlack;
use App\Slack\Slack;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // MySQL Fix for keylength
        Schema::defaultStringLength(191);

        Relation::morphMap([
            'profile' => Profile::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Slack::class, function () {
            return new LegacySlack(config('services.slack.token'));
        });
    }
}
