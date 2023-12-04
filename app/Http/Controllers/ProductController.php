<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quantity;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $agent = new Agent;
        
        if ($agent->isMobile()) {
            return view('mobiles.products.index');
        } elseif ($agent->isDesktop()) {
            return view('desktop.products.index');
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.products.index');        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desktop.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->accurate_id = $request->accurate_id;
        $product->name = $request->name;
        $product->floor = $request->floor;
        $product->corridor = $request->corridor;
        $product->unit = $request->unit;
        $product->save();

        $quantity = new Quantity;
        $quantity->product_id = $product->id;
        $quantity->in = $request->in;
        $quantity->opname = '1';
        $quantity->description = 'opname';
        $quantity->save();

        $qrLink = route('products.show', ['product' => $product->id]);
        $qrCode = QrCode::size(200)->generate($qrLink);
        $product->qr_link = $qrCode;
        $product->save();

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $agent = new Agent;
        
        // Fetch quantities related to the product
        $quantities = Quantity::where('product_id', $product->id)->get();
    
        // Mendapatkan data quantities dengan opname = 1 yang terbaru
        $latestOpname = Quantity::where('product_id', $product->id)
            ->where('opname', 1)
            ->latest('created_at')
            ->first();

        // Menghitung $totalAfter setelah mendapatkan $latestOpname yang terbaru
        $latestQuantitiesAfterOpname = Quantity::where('product_id', $product->id)
        ->where('created_at', '>', $latestOpname->created_at)
        ->get();
        
        // Memeriksa apakah ada $latestOpname yang ditemukan
        $opnameIn = $latestOpname ? $latestOpname->in : 0; // Jika tidak ada, set nilai default ke 0
        
        $totalIn = $quantities->sum('in');
        $totalOut = $quantities->sum('out');
        $totalAfterIn = $latestQuantitiesAfterOpname->sum('in'); // Menghitung total 'in' dari koleksi setelah $latestOpname
        $totalAfterOut = $latestQuantitiesAfterOpname->sum('out');

        $selisihQty = $totalIn-$totalOut;
        $selisih = $opnameIn+$totalAfterIn-$totalAfterOut;
        
        if ($agent->isMobile()) {
            return view('mobiles.products.show', compact('product', 'quantities', 'totalIn', 'totalOut', 'selisih', 'opnameIn', 'selisihQty'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.products.show', compact('product', 'quantities', 'totalIn', 'totalOut', 'selisih', 'opnameIn', 'selisihQty'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan yang sesuai
            return view('unknown-device.products.show', compact('product', 'quantities', 'totalIn', 'totalOut', 'selisih', 'opnameIn', 'selisihQty'));
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
