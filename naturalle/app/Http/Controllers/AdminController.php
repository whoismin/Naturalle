<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Orders;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth'); // Garante que o usuário esteja autenticado
    }

    public function dashboard()
    {
        // Consultas usando Eloquent
        $total_pendings = Orders::where('payment_status', 'pending')->sum('total_price');
        $total_completed = Orders::where('payment_status', 'completed')->sum('total_price');
        $number_of_orders = Orders::count();
        $number_of_products = Product::count();
        $number_of_users = User::where('user_type', 'user')->count();
        $number_of_admins = User::where('user_type', 'admin')->count();
        $number_of_accounts = User::count();
        $number_of_messages = Message::count();

        return view('admin.dashboard', compact(
            'total_pendings',
            'total_completed',
            'number_of_orders',
            'number_of_products',
            'number_of_users',
            'number_of_admins',
            'number_of_accounts',
            'number_of_messages'
        ));
    }
}
