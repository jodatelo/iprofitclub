<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = User::select('*')->orderBy('id', 'DESC')->paginate(5);
        return view('usuarios.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('usuarios.index')
        ->with('success','Usuario desactivado con éxito!');
    }
}
