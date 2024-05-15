<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $userId = auth()->id();
        

        $cartItem = Cart::where('user_id', $userId)
                        ->where('product_id', $product->id)
                        ->first();

        if($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Product added to cart successfully!');
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
    
        return redirect()->back()
                         ->with('success', 'Product deleted successfully');
    }
}
