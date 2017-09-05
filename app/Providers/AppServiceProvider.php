<?php

namespace App\Providers;

use App\Profile;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
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

        // Validato Latitude rule
        Validator::extend('lat', function ($attribute, $value, $parameters, $validator) {
            return isValidLatitude($value);
        });

        // Validate Longitude rule
        Validator::extend('lng', function ($attribute, $value, $parameters, $validator) {
            return isValidLongitude($value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
