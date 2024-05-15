<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ItemRequest;
use App\Imports\ImportCarts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ItemRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemRequests = ItemRequest::with('carts')->get();
        return view('desktop.warehouse.item-request', compact('itemRequests'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desktop.warehouse.add-item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $item = new ItemRequest;
        $item->user_id = $user->id;
        $item->description = $request->description;
        $item->customer = $request->customer;
        $item->address = $request->address;
        $item->delivery_date = $request->delivery_date;
        $item->status = 'waiting';
        $item->save();

        $qrLink = route('edit-item', ['item' => $item->id]);
        $qrCode = QrCode::size(200)->generate($qrLink);
        $item->qr_link = $qrCode;
        
        return redirect()->route('item-request')
                        ->with('success',' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ItemRequest::with('carts')->find($id);
        return view('desktop.warehouse.show-item',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $item = itemRequest::find($id);
        $carts = Cart::where('item_request_id', $item->id)->get();
        return view('desktop.warehouse.edit-item',compact('products','carts','item'));
    }

    public function addToCart(Request $request)
    {
        $user = Auth::user();

        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->item_request_id = $request->item_request_id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->status = 'waiting';
        $cart->save();

        return redirect()->back()
                        ->with('success','Product added successfully.');
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
    
        return redirect()->back()
                         ->with('success', 'Product deleted successfully');
    }
    
    public function import(Request $request)
    {
        $item = $request->item_id;

        Excel::import(new ImportCarts($item), $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function allItem()
    {
        // Mengambil semua item dari Cart
        $items = Cart::all();
    
        // Mengelompokkan item berdasarkan product_id dan menjumlahkan quantity-nya
        $groupedItems = $items->groupBy('product_id')->map(function ($group) {
            // Menghitung jumlah total quantity untuk status 'waiting' dan 'delivery'
            $waitingQuantity = $group->where('status', 'waiting')->sum('quantity');
            $forceQuantity = $group->where('status', 'force')->sum('quantity');
    
            return [
                'product_id' => $group->first()->product_id,
                'quantity' => $group->sum('quantity'),
                'waitingQuantity' => $waitingQuantity,
                'forceQuantity' => $forceQuantity,
                'product' => $group->first()->product,
                'relatedItems' => $group // Simpan semua item yang terkait
            ];
        });
    
        // Mengirimkan data ke view
        return view('desktop.warehouse.all-item', compact('groupedItems'));
    }

    public function updateCart(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $originalQuantity = $cart->quantity;
        $newQuantity = $request->quantity;
    
        // Check if the new quantity is less than the original quantity
        if ($newQuantity < $originalQuantity) {
            $remainingQuantity = $originalQuantity - $newQuantity;
    
            // Create a new cart with the remaining quantity
            Cart::create([
                'product_id' => $cart->product_id,
                'item_request_id' => $cart->item_request_id,
                'user_id' => $cart->user_id,
                'quantity' => $remainingQuantity,
                'status' => 'pending', // Set default status or as required
            ]);
        }
    
        // Update the original cart
        $cart->quantity = $newQuantity;
        $cart->status = $request->status;
        $cart->save();
    
        return redirect()->back()->with('success', 'Status Cart berhasil diperbarui.');
    }    
}
