<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Training;
use App\Models\Candidate;
use Illuminate\Pagination\Paginator;
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
    
        $countPelamar = User::whereDoesntHave('roles')
            ->whereHas('profile', function ($query) {
                $query->where('department', null);
            })
            ->whereDoesntHave('candidate')
            ->count();
    
        view()->share('countPelamar', $countPelamar);

        $countKandidat = Candidate::count();
        view()->share('countKandidat', $countKandidat);

        $countNCC = Training::where('status', 1)->count();
        view()->share('countNCC', $countNCC);

        $countGNC = Training::where('status', 2)->count();
        view()->share('countGNC', $countGNC);

        $countPKL = Training::where('status', 3)->count();
        view()->share('countPKL', $countPKL);
    }
}
