<?php

namespace App\Providers;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public static function register()
    {
        $json = json_encode(config('json_firebase'));
        $serviceAccount = ServiceAccount::fromJson($json);

        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri(env('DATABASE_URI'))
        ->create();

        return $firebase;
    }
}
