<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacina;
use App\Models\Animal;

class VacinaController extends Controller
{

    public function index($idAnimal)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Animal' => 'vacina',
            'Vacinas' => 'false'
        ];
        
        $animal = Animal::where('id_usuario', session('usuario.id_usuario'))->findOrFail($idAnimal)->toArray();
        $vacinas = Vacina::where('id_usuario', session('usuario.id_usuario'))
                        ->where('flag_excluido', 0)
                        ->whereIdAnimal($idAnimal)
                        ->get()
                        ->toArray();
       
        return view('vacina.list', 
        [ 
            'animal' => $animal,
            'vacinas' => $vacinas,
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function animal()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Animal' => 'false'
        ];
     
        $animais = Animal::where('id_usuario', session('usuario.id_usuario'))->get();
        
        return view('vacina.animal', [ 'animais' => $animais, 'breadcrumb' => $breadcrumb] );
    }

    public function create()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Vacina' => 'vacina',
            'Registrar'=> 'false'
        ];

        return view('vacina.create', [ 'breadcrumb' => $breadcrumb] );
    }

    public function store(Request $request)
    {   
        $request->validate([
            'vacina' => 'required',
        ]);
        
        $vacina = new Vacina();

        $vacina->id_usuario = session('usuario.id_usuario');
        // Validar se o ID passado é de fato do usuário com where
        $vacina->id_animal = $request->id_animal;
        $vacina->vacina = $request->vacina;
        $vacina->dose = $request->dose;
        $vacina->data_aplicacao = $request->data_aplicacao;
        $vacina->data_revacinacao = $request->data_revacinacao;
        $vacina->veterinario = $request->veterinario;
        $vacina->registro_crmv = $request->registro_crmv;
        $vacina->data_registro = now()->toDateString('Y-m-d');

        $vacina->save();
        
        return redirect()->route('vacina.animal', $request->id_animal);
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

    public function destroy($idVacina)
    {
        $vacina = Vacina::where('id_usuario', session('usuario.id_usuario'))->findOrFail($idVacina);
        $vacina->flag_excluido = 1;
        $vacina->save();

        # Mensagem
        session()->flash('alert', 'excluido');

        return redirect()->route('vacina');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        $all = implode(',', $ids);
        Vacina::whereIn('id_vacina', explode(',', $all))->update(['flag_excluido' => 1]);

        # Mensagem
        session()->flash('alert', 'excluido');
        
        return redirect()->route('vacina');
    }
}
