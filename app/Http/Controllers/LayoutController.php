<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard' ,compact('user'));
    }
}
