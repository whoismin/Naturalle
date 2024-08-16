<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show()
    {
        $user_id = Auth::id();

        if (!$user_id) {
            return redirect()->route('login');
        }

        $cartItems = Cart::where('user_id', $user_id)->get();
        $cartGrandTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'cartGrandTotal'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        if (!$user_id) {
            return redirect()->route('login');
        }

        $request->validate([
            'nome' => 'required|string',
            'telefone' => 'required|string',
            'method' => 'required|string',
            'ong' => 'required|string',
            'rua' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'cep' => 'required|string',
            'pontos_usados' => 'nullable|numeric'
        ]);

        $address = implode(', ', [
            $request->rua,
            $request->bairro,
            $request->cidade,
            $request->estado,
            $request->cep
        ]);

        $cartItems = Cart::where('user_id', $user_id)->get();
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $totalProducts = $cartItems->map(function ($item) {
            return "{$item->name} ({$item->quantity})";
        })->implode(', ');

        // Check if the order has already been made
        $orderExists = Order::where([
            ['name', '=', $request->nome],
            ['number', '=', $request->telefone],
            ['method', '=', $request->method],
            ['address', '=', $address],
            ['total_products', '=', $totalProducts],
            ['total_price', '=', $cartTotal]
        ])->exists();

        if ($cartTotal == 0) {
            return redirect()->back()->with('message', 'Seu carrinho está vazio');
        } elseif ($orderExists) {
            return redirect()->back()->with('message', 'Pedido já feito!');
        } else {
            $pontosUsados = $request->input('pontos_usados', 0);
            $cartTotal -= $pontosUsados;

            // Update user points
            $user = Auth::user();
            $user->pontos_usados += $pontosUsados;
            $user->save();

            // Insert the order
            Order::create([
                'user_id' => $user_id,
                'name' => $request->nome,
                'number' => $request->telefone,
                'email' => $user->email,
                'method' => $request->method,
                'address' => $address,
                'total_products' => $totalProducts,
                'total_price' => $cartTotal,
                'placed_on' => now()->format('d-M-Y'),
            ]);

            // Delete items from the cart
            Cart::where('user_id', $user_id)->delete();

            // Update user points
            $bonusPercentage = 0.20;
            $pointsEarned = $cartTotal * (1 + $bonusPercentage);

            $user->pontos += $pointsEarned;
            $user->save();

            return redirect()->route('checkout')->with('message', 'Pedido realizado com sucesso! Você ganhou ' . $pointsEarned . ' pontos.');
        }
    }
}


