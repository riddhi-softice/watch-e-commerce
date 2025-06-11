<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showCart()
    {
        $uid = auth()->id();
        $cartItems = CartItem::with('product.firstImage')->where('user_id', $uid)->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        return view('web.product_cart', compact('cartItems', 'subtotal'));
    }
    
    public function addOrder(Request $request, $productId)
    {
        $uid = auth()->id();
        $product = Product::with(['images'])->findOrFail($productId);
        return view('web.order.add_order', compact('product'));
    }

    public function updateCart(Request $request)
    {
        $uid = auth()->id();
        foreach ($request->quantities as $id => $qty) {
            CartItem::where('id', $id)->where('user_id',$uid)->update(['quantity' => max(1, (int)$qty)]);
        }
        return response()->json(['success' => true, 'message' => 'Cart updated successfully.']);
        // return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    public function removeItem($id)
    {
        $uid = auth()->id();
        $cartItem = CartItem::where('id', $id)->where('user_id', $uid)->first();
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
        }
        return redirect()->route('cart.index')->with('error', 'Item not found.');
    }

}
