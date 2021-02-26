<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Proprietario;
use App\Models\Especie;
use App\Models\Raca;

class AnimalController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Animal' => 'false'
        ];
        
        $animais = Animal::with('raca')
                        ->where('id_usuario', session('usuario.id_usuario'))
                        ->where('flag_excluido', 0)
                        ->get();
       
        return view('animal.list', [ 'animais' => $animais, 'breadcrumb' => $breadcrumb] );
    }

    public function detalhes($idAnimal)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Animal' => 'animal',
            'Detalhes' => 'false'
        ];

        $animal = Animal::where('id_usuario', session('usuario.id_usuario'))
                        ->where('flag_excluido', 0)
                        ->with('proprietario')
                        ->with('raca')
                        ->with('especie')
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

        $proprietarios = Proprietario::where('id_usuario', session('usuario.id_usuario'))
                                    ->where('flag_excluido', 0)
                                    ->get();

        $especies = Especie::where('id_usuario', session('usuario.id_usuario'))
                          ->where('flag_excluido', 0)
                          ->get();

        $racas = Raca::where('id_usuario', session('usuario.id_usuario'))
                    ->where('flag_excluido', 0)
                    ->get();

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

        // Poderia ser
        /*
            $animal = new Animal();
            $animal->fill($request->all());
            $animal->save();
        */
        // poderia ser também
        /*
            Animal::create($request->all());
        */

        $request->validate([
            'nome' => 'required|min:3|max:40',
            'id_proprietario' => 'required',
            'identificacao' => 'required',
            'data_nascimento' => 'required'
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
        $breadcrumb = [
            'Início' => 'painel',
            'Animal' => 'animal',
            'Editar' => 'false'
        ];

        $animal = Animal::findOrFail($id);

        $proprietarios = Proprietario::where('id_usuario', session('usuario.id_usuario'))
                                    ->where('flag_excluido', 0)
                                    ->get();

        $especies = Especie::where('id_usuario', session('usuario.id_usuario'))
                          ->where('flag_excluido', 0)
                          ->get();

        $racas = Raca::where('id_usuario', session('usuario.id_usuario'))
                    ->where('flag_excluido', 0)
                    ->get();

        return view('animal.edit', 
        [ 
            'animal' => $animal,
            'proprietarios' => $proprietarios,
            'especies' => $especies,
            'racas' => $racas, 
            'breadcrumb' => $breadcrumb  
        ]);
    }

    public function update(Request $request, $idAnimal)
    {
        /*
        $request->validate([
            //
        ]);

        
        $data = [
            'nome' => $request->razao_social,
            'data_nascimento' => $request->nome_fantasia,
            'microchip' => $request->cnpj
        ];

        Animal::whereIdAnimal($idAnimal)->update($data);
        
        # Mensagem
        session()->flash('alert', 'editado');
        return redirect()->route('animal');  
        */

    }

    public function destroy($idAnimal)
    {
        $animal = Animal::where('id_usuario', session('usuario.id_usuario'))->findOrFail($idAnimal);
        $animal->flag_excluido = 1;
        $animal->save();

        # Mensagem
        session()->flash('alert', 'excluido');

        return redirect()->route('animal');
    }
}
