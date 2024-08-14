<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Mostrar todos os usuários
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Excluir um usuário
    public function destroy($id)
    {
        // Verificar se o usuário a ser excluído é o administrador logado
        if ($id == auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Não é possível excluir o próprio usuário.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('message', 'Usuário excluído com sucesso');
    }
}