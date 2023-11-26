<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\AbbreviateNumber;

class AbbreviateNumberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // require_once app_path() . '/Helpers/AbbreviateNumber.php';
        $this->app->bind('abbreviatenumber', function () {
            return new AbbreviateNumber();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
