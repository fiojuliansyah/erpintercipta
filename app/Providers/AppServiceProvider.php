<?php

namespace App\Providers;

use Notification;
use App\Models\User;
use App\Models\Training;
use App\Models\Candidate;
use Illuminate\Pagination\Paginator;
use App\Broadcasting\WhatsappChannel;
use Illuminate\Support\Facades\Blade;
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
        
        if (!$this->app->runningInConsole()) {

        $countPelamar = User::whereDoesntHave('roles')
        ->whereHas('profile', function ($query) {
            $query->where('department', null);
        })
        ->whereDoesntHave('candidate')
        ->count();
    
        view()->share('countPelamar', $countPelamar);

        $countKandidat = Candidate::where('status', 0)->count();
        view()->share('countKandidat', $countKandidat);

        $countPending = Candidate::where('status', 1)->count();
        view()->share('countPending', $countPending);

        $countNCC = Candidate::where('status', 2)->count();
        view()->share('countNCC', $countNCC);

        $countGNC = Candidate::where('status', 3)->count();
        view()->share('countGNC', $countGNC);

        $countInterview = Candidate::where('status', 4)->count();
        view()->share('countInterview', $countInterview);

        $countReject = Candidate::where('status', 5)->count();
        view()->share('countReject', $countReject);

        }

        Notification::extend('whatsapp', function ($app) {
            return new WhatsappChannel();
        });
    }
}
