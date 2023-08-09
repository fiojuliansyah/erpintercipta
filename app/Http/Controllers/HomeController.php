<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $careers = Career::paginate(2);
        $allcareer = Career::count();
        return view('welcome' ,compact('careers','allcareer'));
    }
}
