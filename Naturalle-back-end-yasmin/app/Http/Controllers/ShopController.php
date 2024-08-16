<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function addToWishlist(Request $request)
    {
        $userId = Auth::id();
        $pid = filter_var($request->input('pid'), FILTER_SANITIZE_STRING);
        $pName = filter_var($request->input('p_name'), FILTER_SANITIZE_STRING);
        $pPrice = filter_var($request->input('p_price'), FILTER_SANITIZE_STRING);
        $pImage = filter_var($request->input('p_image'), FILTER_SANITIZE_STRING);

        $existingWishlistItem = Wishlist::where('name', $pName)
            ->where('user_id', $userId)
            ->first();

        $existingCartItem = Cart::where('name', $pName)
            ->where('user_id', $userId)
            ->first();

        if ($existingWishlistItem) {
            $message = 'Produto já adicionado na sua lista de desejos!';
        } elseif ($existingCartItem) {
            $message = 'Produto já adicionado no carrinho!';
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'pid' => $pid,
                'name' => $pName,
                'price' => $pPrice,
                'image' => $pImage,
            ]);
            $message = 'Produto adicionado na lista de desejos';
        }

        return redirect()->back()->with('message', $message);
    }

    public function addToCart(Request $request)
    {
        $userId = Auth::id();
        $pid = filter_var($request->input('pid'), FILTER_SANITIZE_STRING);
        $pName = filter_var($request->input('p_name'), FILTER_SANITIZE_STRING);
        $pPrice = filter_var($request->input('p_price'), FILTER_SANITIZE_STRING);
        $pImage = filter_var($request->input('p_image'), FILTER_SANITIZE_STRING);
        $pQty = filter_var($request->input('p_qty'), FILTER_SANITIZE_STRING);

        $existingCartItem = Cart::where('name', $pName)
            ->where('user_id', $userId)
            ->first();

        if ($existingCartItem) {
            $message = 'Produto já adicionado no carrinho!';
        } else {
            $existingWishlistItem = Wishlist::where('name', $pName)
                ->where('user_id', $userId)
                ->first();

            if ($existingWishlistItem) {
                $existingWishlistItem->delete();
            }

            Cart::create([
                'user_id' => $userId,
                'pid' => $pid,
                'name' => $pName,
                'price' => $pPrice,
                'quantity' => $pQty,
                'image' => $pImage,
            ]);
            $message = 'Produto adicionado no carrinho!';
        }

        return redirect()->back()->with('message', $message);
    }
}
