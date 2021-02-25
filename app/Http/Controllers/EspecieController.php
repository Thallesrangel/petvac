<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;

class EspecieController extends Controller
{

    public function index()
    {
        return view('especie.list');
    }

    public function create()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Espécie' => 'especie',
            'Registrar' => 'false'
        ];

        return view('especie.create', [ 'breadcrumb' => $breadcrumb] );
    }

    public function store(Request $request)
    {
        $request->validate([
            'especie' => 'required',
        ]);
        
        $especie = new Especie();

        $especie->id_usuario = session('usuario.id_usuario');
        $especie->especie = $request->especie;
        $especie->save();

        # Mensagem
        //session()->flash('alert', 'registrado');

        return redirect()->route('especie');
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
