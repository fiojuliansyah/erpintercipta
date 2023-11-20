<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

class HomeController extends Controller
{  
    public function welcomeMobile()
    {
        return view('mobiles.welcome');
    }

    public function iform()
    {
        return view('mobiles.iform.index');
    }

    public function profile()
    {
        return view('mobiles.profile.index');
    }
}
