<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Career;
use App\Models\Addendum;
use App\Models\Training;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('desktop.trainings.index');
    }

    public function indexPending()
    {
        return view('desktop.trainings.pending');
    }

    public function indexNCC()
    {
        return view('desktop.trainings.ncc');
    }

    public function indexGNC()
    {
        return view('desktop.trainings.gnc');
    }

    public function indexInterview()
    {
        return view('desktop.trainings.interviewuser');
    }

    public function indexReject()
    {
        return view('desktop.trainings.reject');
    }

    public function showDoc(Candidate $candidate)
    {
        $sites = Site::all();
        $careers = Career::all();
        $addendums = Addendum::all();
        return view('desktop.trainings.show', compact('candidate','addendums', 'sites', 'careers'));
    }
}
