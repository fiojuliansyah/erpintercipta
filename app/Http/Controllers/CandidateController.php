<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        return view('candidates.index');
    }

    public function show(User $candidate)
    {
        $careers = Career::all();
        return view('candidates.show', compact('candidate','careers'));
    }
}
