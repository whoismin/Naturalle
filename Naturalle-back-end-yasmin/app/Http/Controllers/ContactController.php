<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|max:20',
            'msg' => 'required|string',
        ]);

        $userId = Auth::id();
        $exists = DB::table('message')
            ->where('name', $validated['name'])
            ->where('email', $validated['email'])
            ->where('number', $validated['number'])
            ->where('message', $validated['msg'])
            ->exists();

        if ($exists) {
            return back()->with('message', 'Já enviei mensagem!');
        } else {
            DB::table('message')->insert([
                'user_id' => $userId,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'number' => $validated['number'],
                'message' => $validated['msg'],
            ]);
            return back()->with('message', 'Mensagem enviada com sucesso!');
        }
    }
}
