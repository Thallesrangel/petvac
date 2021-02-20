<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function index()
    {
        return view('sign.signin');
    }

    public function login(Request $request)
    {
        $login = addslashes($request->email);
        $senha = MD5(addslashes($request->senha));
        
        $usuario = Usuario::where('email', '=', $login)->where('senha', '=', $senha)->first();
        
        return $this->logarUsuario($usuario);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }

    private function logarUsuario($usuario)
    {
        if (!empty($usuario)) {
                session()->put('usuario', $usuario);
                return redirect()->route('painel');
        } else {
            # Mensagem
            //session()->flash('alert', 'login_incorreto');

            return redirect()->route('login');
        }
    }
}
