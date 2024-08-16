<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $user_id = session('user_id');

        if (!$user_id) {
            return redirect()->route('login');
        }

        $wishlist_items = Wishlist::where('user_id', $user_id)->get();
        $grand_total = $wishlist_items->sum('price');

        return view('wishlist', compact('wishlist_items', 'grand_total'));
    }

    public function addToCart(Request $request)
    {
        $user_id = session('user_id');

        if (!$user_id) {
            return redirect()->route('login');
        }

        $data = $request->only(['pid', 'p_name', 'p_price', 'p_image', 'p_qty']);
        $data = array_map('trim', $data);

        $cart_exists = Cart::where('name', $data['p_name'])->where('user_id', $user_id)->exists();

        if ($cart_exists) {
            return back()->with('message', 'already added to cart!');
        } else {
            $wishlist_item = Wishlist::where('name', $data['p_name'])->where('user_id', $user_id)->first();

            if ($wishlist_item) {
                $wishlist_item->delete();
            }

            Cart::create([
                'user_id' => $user_id,
                'pid' => $data['pid'],
                'name' => $data['p_name'],
                'price' => $data['p_price'],
                'quantity' => $data['p_qty'],
                'image' => $data['p_image'],
            ]);

            return back()->with('message', 'added to cart!');
        }
    }

    public function delete($id)
    {
        Wishlist::where('id', $id)->delete();
        return redirect()->route('wishlist');
    }

    public function deleteAll()
    {
        $user_id = session('user_id');
        Wishlist::where('user_id', $user_id)->delete();
        return redirect()->route('wishlist');
    }
}
