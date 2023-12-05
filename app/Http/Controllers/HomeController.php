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

    public function iform()
    {
        return view('mobiles.iform.index');
    }

    public function chain()
    {
        return view('mobiles.chain.index');
    }

    public function itemreq()
    {
        return view('mobiles.chain.itemreq');
    }

    public function profile()
    {
        return view('mobiles.profile.index');
    }

    public function scan()
    {
        return view('mobiles.scanner.index');
    }
}
