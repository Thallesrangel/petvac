<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario;

class ProprietarioController extends Controller
{

    public function index()
    {
        return view('proprietario.list');
    }

    public function create()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Proprietáro' => 'proprietario',
            'Registrar' => 'false'
        ];

        return view('proprietario.create', [ 'breadcrumb' => $breadcrumb ] );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        
        $proprietario = new Proprietario();

        $proprietario->id_usuario = session('usuario.id_usuario');
        $proprietario->nome = $request->nome;
        $proprietario->save();

        # Mensagem
        //session()->flash('alert', 'registrado');

        return redirect()->route('proprietario');
    }

    public function show($id)
    {
    
    }

    public function edit($id)
    {
    
    }


    public function update(Request $request, $id)
    {
    
    }

    public function destroy($id)
    {
    
    }
}
