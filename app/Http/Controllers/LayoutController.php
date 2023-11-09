<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('desktop.dashboard' ,compact('user'));
    }
}
