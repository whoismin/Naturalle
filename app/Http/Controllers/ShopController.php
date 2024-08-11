<?php

// app/Http/Controllers/ShopController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('shop', ['products' => $products]);
    }

    public function addToWishlist(Request $request)
    {
        $userId = Auth::id();
        $pid = $request->input('pid');
        $pName = $request->input('p_name');
        $pPrice = $request->input('p_price');
        $pImage = $request->input('p_image');

        $existsInWishlist = DB::table('wishlist')
            ->where('name', $pName)
            ->where('user_id', $userId)
            ->exists();

        $existsInCart = DB::table('cart')
            ->where('name', $pName)
            ->where('user_id', $userId)
            ->exists();

        if ($existsInWishlist) {
            return back()->with('message', 'Produto já adicionado na sua lista de desejos!');
        } elseif ($existsInCart) {
            return back()->with('message', 'Produto já adicionado no carrinho!');
        } else {
            DB::table('wishlist')->insert([
                'user_id' => $userId,
                'pid' => $pid,
                'name' => $pName,
                'price' => $pPrice,
                'image' => $pImage,
            ]);
            return back()->with('message', 'Produto adicionado na lista de desejos');
        }
    }

    public function addToCart(Request $request)
    {
        $userId = Auth::id();
        $pid = $request->input('pid');
        $pName = $request->input('p_name');
        $pPrice = $request->input('p_price');
        $pImage = $request->input('p_image');
        $pQty = $request->input('p_qty');

        $existsInCart = DB::table('cart')
            ->where('name', $pName)
            ->where('user_id', $userId)
            ->exists();

        if ($existsInCart) {
            return back()->with('message', 'Produto já adicionado no carrinho!');
        } else {
            $existsInWishlist = DB::table('wishlist')
                ->where('name', $pName)
                ->where('user_id', $userId)
                ->exists();

            if ($existsInWishlist) {
                DB::table('wishlist')
                    ->where('name', $pName)
                    ->where('user_id', $userId)
                    ->delete();
            }

            DB::table('cart')->insert([
                'user_id' => $userId,
                'pid' => $pid,
                'name' => $pName,
                'price' => $pPrice,
                'quantity' => $pQty,
                'image' => $pImage,
            ]);
            return back()->with('message', 'Produto adicionado no carrinho!');
        }
    }
}
