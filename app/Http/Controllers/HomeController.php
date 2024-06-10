<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Product;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function warehouse()
    {
        return view('mobiles.warehouse.index');
    }

    public function hris()
    {
        return view('mobiles.hris.index');
    }

    public function itemreq()
    {
        $products = Product::all(); 
        return view('mobiles.warehouse.itemreq', compact('products'));
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
