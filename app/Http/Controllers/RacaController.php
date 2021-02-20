<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raca;
use App\Models\Especie;

class RacaController extends Controller
{

    public function index()
    {
        return view('raca.list');
    }

    public function create()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Raça' => 'raca',
            'Registrar' => 'false'
        ];

        $especies = Especie::get();
        return view('raca.create', ['especies' => $especies, 'breadcrumb' => $breadcrumb ] );
    }

    public function store(Request $request)
    {
        $request->validate([
            'raca' => 'required',
        ]);
        
        $raca = new Raca();

        $raca->id_usuario = session('usuario.id_usuario');
        $raca->raca = $request->raca;
        $raca->id_especie = $request->id_especie;
        $raca->save();

        # Mensagem
        //session()->flash('alert', 'registrado');

        return redirect()->route('raca');
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
        //
    }
}
