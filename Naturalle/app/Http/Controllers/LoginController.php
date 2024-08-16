<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Certifique-se de que o nome da view é 'login.blade.php'
    }

    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Busca o usuário no banco de dados
        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Autenticação manual
            Session::put('user_id', $user->id);
            Session::put('user_type', $user->user_type);
            Session::put('user_name', $user->name);

            // Redireciona conforme o tipo de usuário
            if ($user->user_type == 'admin') {
                return redirect()->route('admin.page');
            } elseif ($user->user_type == 'user') {
                return redirect()->route('home');
            }
        }

        // Redireciona de volta com mensagem de erro
        return redirect()->back()->withErrors([
            'email' => 'Email ou senha incorretos!',
        ]);
    }

    public function logout()
    {
        // Limpa a sessão
        Session::flush();

        return redirect()->route('login.form');
    }
}
