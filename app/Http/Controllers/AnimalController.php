<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Proprietario;
use App\Models\Especie;
use App\Models\Raca;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Animal' => 'false'
        ];
        
        $animais = Animal::with('raca')->get();
       
        return view('animal.list', [ 'animais' => $animais, 'breadcrumb' => $breadcrumb] );
    }

    public function detalhes($idAnimal)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Animal' => 'animal',
            'Detalhes' => 'false'
        ];

        $animal = Animal::with('raca')
                        ->with('especie')
                        ->with('proprietario')
                        ->findOrFail($idAnimal)
                        ->toArray();
            
        return view('animal.details', [ 'animal' => $animal, 'breadcrumb' => $breadcrumb] );
    }

    public function create()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Animal' => 'animal',
            'Registrar' => 'false'
        ];

        $proprietarios = Proprietario::get();
        $especies = Especie::get();
        $racas = Raca::get();

        return view('animal.create', 
        [ 
            'proprietarios' => $proprietarios,
            'especies' => $especies,
            'racas' => $racas, 
            'breadcrumb' => $breadcrumb  
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        
        $animal = new Animal();

        $animal->id_usuario = session('usuario.id_usuario');
        $animal->nome = $request->nome;
        $animal->id_proprietario = $request->id_proprietario;
        $animal->identificacao = $request->identificacao;
        $animal->data_nascimento = $request->data_nascimento;
        $animal->id_especie = $request->id_especie;
        $animal->id_raca = $request->id_raca;
        $animal->cor = $request->cor;
        $animal->flag_sexo = $request->flag_sexo;
        $animal->flag_castrado = $request->flag_castrado;
        $animal->flag_filhote = $request->flag_filhote;
        $animal->microchip = $request->microchip;
        $animal->data_implantacao = $request->data_implantacao;
        $animal->local_implantacao = $request->local_implantacao;
        $animal->url_img = '';
        $animal->data_registro = now()->toDateString('Y-m-d');

        $animal->save();
        
        return redirect()->route('animal');
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
