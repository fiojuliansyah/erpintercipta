<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pkwt;
use App\Models\User;
use App\Models\Career;
use App\Models\Company;
use App\Models\Product;
use App\Models\Statory;
use App\Models\Document;
use App\Models\Candidate;
use App\Models\ItemRequest;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = new Agent;
        $user = Auth::user();
        $careers = Career::paginate(5);
        $documentCount = Document::where('user_id', $user->id)->count();

        if ($agent->isMobile()) {
            return view('mobiles.home', compact('user','careers','documentCount'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.dashboard' ,compact('user','careers','documentCount'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.dashboard' ,compact('user','careers','documentCount'));
        }
    }

    public function karir()
    {
        $agent = new Agent;
        $user = Auth::user();
        $careers = Career::all();
        $allcareer = Career::count();
        $alluser = User::count();
        $companies = Company::all();

        if ($agent->isMobile()) {
            return view('mobiles.job-portal' ,compact('careers','user','allcareer','alluser','companies'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.job-portal' ,compact('careers','user','allcareer','alluser','companies'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.job-portal' ,compact('careers','user','allcareer','alluser','companies'));
        }
    }

    public function karirDetail($id)
    {
        $agent = new Agent;

        $career = Career::find($id);
        $careers = Career::paginate(5);
        $allcareer = Career::count();
        $alluser = User::count();
        $companies = Company::all();

        if ($agent->isMobile()) {
            return view('mobiles.job-detail' ,compact('career', 'careers'));
        } elseif ($agent->isDesktop()) {
             return view('desktop.job-detail',compact('career','allcareer','alluser','companies'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
             return view('desktop.job-detail',compact('career','allcareer','alluser','companies'));
        }
    }

    public function jobPortal()
    {
        $agent = new Agent;

        $user = Auth::user();
        $careers = Career::all();
        $allcareer = Career::count();
        $alluser = User::count();
        $companies = Company::all();

        if ($agent->isMobile()) {
            return view('mobiles.jobportal.index' ,compact('careers','user','allcareer','alluser','companies'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.jobportal.index' ,compact('careers','user','allcareer','alluser','companies'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.jobportal.index' ,compact('careers','user','allcareer','alluser','companies'));
        }
        
    }

    public function jobDetail($id)
    {
        $agent = new Agent;
        $careers = Career::paginate(5);
        $career = Career::find($id);

        if ($agent->isMobile()) {
            return view('mobiles.jobportal.show',compact('career', 'careers'));;
        } elseif ($agent->isDesktop()) {
            return view('desktop.jobportal.show',compact('career', 'careers'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.jobportal.show',compact('career', 'careers'));
        }
        
    }

    public function history()
    {
        $agent = new Agent;
        $userId = Auth::id();
        $candidates = Candidate::where('user_id', $userId)->get();
    
        $statories = collect(); // Inisialisasi collection kosong untuk menampung hasil Statory
    
        foreach ($candidates as $candidate) {
            // Mengambil Statory berdasarkan candidate_id untuk setiap kandidat
            $statoriesForCandidate = Statory::where('candidate_id', $candidate->id)->get();
            $statories = $statories->merge($statoriesForCandidate); // Menggabungkan hasil setiap kandidat ke dalam collection
        }
    
        if ($agent->isMobile()) {
            return view('mobiles.history', compact('candidates', 'statories'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.history', compact('candidates', 'statories'));
        } else {
            return view('desktop.history', compact('candidates', 'statories'));
        }
    }    

    public function pkwt(Pkwt $pkwt)
    {
        $agent = new Agent;

        if ($agent->isMobile()) {
            return view('mobiles.tanda-tangan', compact('pkwt'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.tanda-tangan', compact('pkwt'));
        } else {
            return view('desktop.tanda-tangan', compact('pkwt'));
        }
        
    }


    public function MyResume(Candidate $candidate)
    {
        $agent = new Agent;
        
        if ($agent->isMobile()) {
            return view('mobiles.my-resume',compact('candidate'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.my-resume',compact('candidate'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.my-resume',compact('candidate'));
        }
        
        
    }

    public function dashboardEmployee()
    {
        $user = Auth::user();
        return view('desktop.dashboard-employee' ,compact('user'));
    }

    public function catalog()
    {
        $products = Product::all();
        $cart = Cart::where('status', 'pending')->count();
        return view('desktop.warehouse.catalog', compact('products', 'cart'));
    }
    
    
    public function addToCart(Request $request)
    {
        $user = Auth::user();

        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->status = 'pending';
        $cart->save();

        return redirect()->route('catalog')
                        ->with('success','Product added successfully.');
    }

    public function cart()
    {
        $user = Auth::user();
        $carts = Cart::where('status', 'pending')
                    ->where('user_id', $user->id)
                    ->get();
    
        $products = $carts->map(function ($item) {
            return $item->product;
        });
    
        return view('desktop.warehouse.cart', compact('products', 'carts'));
    }

    public function itemReq(Request $request)
    {
        $user = Auth::user();

        $itemreq = new ItemRequest;
        $itemreq->user_id = $user->id;
        $itemreq->status = 'waiting';
        $itemreq->customer = $request->customer;
        $itemreq->address = $request->address;
        $itemreq->description = $request->description;
        $itemreq->save();
    
        return redirect()->route('item-request')
                        ->with('success','Product added successfully.');
    }

    public function showItem($id)
    {   
        $item = ItemRequest::with('carts')->find($id);
        return view('desktop.warehouse.show-item',compact('item'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
