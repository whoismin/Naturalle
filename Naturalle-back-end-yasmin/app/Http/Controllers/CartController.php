<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $cart_items = DB::table('cart')->where('user_id', $user_id)->get();
        $total_products_in_cart = $cart_items->count();

        return view('cart', compact('cart_items', 'total_products_in_cart'));
    }

    public function updateQuantity(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $p_qty = $request->input('p_qty');

        DB::table('cart')
            ->where('id', $cart_id)
            ->update(['quantity' => $p_qty]);

        return redirect()->route('cart.index')->with('message', 'Cart quantity updated');
    }

    public function delete($id)
    {
        DB::table('cart')->where('id', $id)->delete();
        return redirect()->route('cart.index');
    }

    public function deleteAll()
    {
        $user_id = Auth::id();
        DB::table('cart')->where('user_id', $user_id)->delete();
        return redirect()->route('cart.index');
    }
}
