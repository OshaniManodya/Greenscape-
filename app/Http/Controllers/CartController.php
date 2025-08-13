<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
        return view('cart', compact('cartItems'));
    }
    
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cartItem = Auth::user()->cartItems()
            ->where('product_id', $request->product_id)
            ->first();
            
        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity
            ]);
        } else {
            Auth::user()->cartItems()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }
        
        return response()->json([
            'success' => true,
            'cart_count' => Auth::user()->cartItems()->count()
        ]);
    }
    
    public function updateCart(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1|max:10'
        ]);
        
        $cartItem = Auth::user()->cartItems()
            ->where('id', $request->cart_id)
            ->firstOrFail();
            
        $cartItem->update(['quantity' => $request->quantity]);
        
        return response()->json(['success' => true]);
    }
    
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id'
        ]);
        
        Auth::user()->cartItems()
            ->where('id', $request->cart_id)
            ->delete();
            
        return response()->json(['success' => true]);
    }

    
}
