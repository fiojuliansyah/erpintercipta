<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $agent = new Agent;
        
        $careers = Career::paginate(2);
        $careersmo = Career::paginate(2);
        $allcareer = Career::count();
    
        if ($agent->isMobile()) {
            return view('mobiles.welcome', compact('careers', 'careersmo', 'allcareer'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.welcome', compact('careers', 'allcareer'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.welcome', compact('careers', 'allcareer'));
        }
    }    

    public function welcomeMobile()
    {
        return view('mobiles.welcome');
    }

    public function homeMobile()
    {
        return view('mobiles.home');
    }
}
