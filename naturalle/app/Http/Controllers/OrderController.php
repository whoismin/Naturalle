<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrderController extends Controller
{
    // Mostrar todos os pedidos
    public function index()
    {
        $orders = Orders::all();
        return view('admin.orders.index', compact('orders'));
    }

    // Atualizar o status do pagamento do pedido
    public function update(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'update_payment' => 'required|string'
        ]);

        $order = Orders::find($request->order_id);
        $order->payment_status = $request->update_payment;
        $order->save();

        return redirect()->route('admin.orders.index')->with('message', 'Forma de pagamento atualizada');
    }

    // Excluir um pedido
    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('message', 'Pedido excluído com sucesso');
    }
}
