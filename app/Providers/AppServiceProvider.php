<?php

namespace App\Providers;

use Notification;
use App\Models\User;
use App\Models\Training;
use App\Models\Candidate;
use Illuminate\Pagination\Paginator;
use App\Broadcasting\WhatsappChannel;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format((float)$expression, 0, ',', '.'); ?>";
        });        

        Schema::defaultStringLength(191);
    }
}
