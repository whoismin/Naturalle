<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        return view('products.index', compact('products', 'user'));
    }

    public function addToWishlist(Request $request)
    {
        $user = Auth::user();
        $pid = filter_var($request->pid, FILTER_SANITIZE_STRING);
        $p_name = filter_var($request->p_name, FILTER_SANITIZE_STRING);
        $p_price = filter_var($request->p_price, FILTER_SANITIZE_STRING);
        $p_image = filter_var($request->p_image, FILTER_SANITIZE_STRING);

        if (Wishlist::where('name', $p_name)->where('user_id', $user->id)->exists()) {
            return back()->with('message', 'Produto já adicionado na sua lista de desejos!');
        } elseif (Cart::where('name', $p_name)->where('user_id', $user->id)->exists()) {
            return back()->with('message', 'Produto já adicionado no carrinho!');
        } else {
            Wishlist::create([
                'user_id' => $user->id,
                'pid' => $pid,
                'name' => $p_name,
                'price' => $p_price,
                'image' => $p_image,
            ]);
            return back()->with('message', 'Produto adicionado na lista de desejos');
        }
    }

    public function addToCart(Request $request)
    {
        $user = Auth::user();
        $pid = filter_var($request->pid, FILTER_SANITIZE_STRING);
        $p_name = filter_var($request->p_name, FILTER_SANITIZE_STRING);
        $p_price = filter_var($request->p_price, FILTER_SANITIZE_STRING);
        $p_image = filter_var($request->p_image, FILTER_SANITIZE_STRING);
        $p_qty = filter_var($request->p_qty, FILTER_SANITIZE_STRING);

        if (Cart::where('name', $p_name)->where('user_id', $user->id)->exists()) {
            return back()->with('message', 'Produto já adicionado no carrinho!');
        } else {
            Wishlist::where('name', $p_name)->where('user_id', $user->id)->delete();

            Cart::create([
                'user_id' => $user->id,
                'pid' => $pid,
                'name' => $p_name,
                'price' => $p_price,
                'quantity' => $p_qty,
                'image' => $p_image,
            ]);

            return back()->with('message', 'Produto adicionado no carrinho!');
        }
    }
}
