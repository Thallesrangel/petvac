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
        
        $animal = Animal::where('id_usuario', session('usuario.id_usuario'))
                        ->where('flag_excluido', 0)
                        ->findOrFail($idAnimal)
                        ->toArray();
        
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
     
        $animais = Animal::where('id_usuario', session('usuario.id_usuario'))
                        ->where('flag_excluido', 0)
                        ->paginate(12);
        
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
        
        # Mensagem
        session()->flash('alert', 'registrado');
        
        return redirect()->route('vacina.animal', $request->id_animal);
    }

    public function edit($idVacina)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Vacina' => 'vacina',
            'Editar' => 'false'
        ];

        $vacina = Vacina::where('id_usuario', session('usuario.id_usuario'))->findOrFail($idVacina)->toArray();
        $animal = Animal::where('id_usuario', session('usuario.id_usuario'))->where('id_usuario', $vacina['id_animal'])->first();
        
        return view('vacina.edit', [ 'vacina' => $vacina, 'animal' => $animal, 'breadcrumb' => $breadcrumb ] );
    }

    public function update(Request $request, $idVacina)
    {
        $request->validate([
            'vacina' => 'required',
            'dose' => 'required',
            'data_aplicacao' => 'required'
        ]);

        $data = [
            'vacina' => $request->vacina,
            'dose' => $request->dose,
            'data_aplicacao' => $request->data_aplicacao,
            'data_revacinacao' => $request->data_revacinacao,
            'veterinario' => $request->veterinario,
            'registro_crmv' => $request->registro_crmv
        ];

        Vacina::where('id_usuario', session('usuario.id_usuario'))->where('id_vacina', $idVacina)->update($data);

        session()->flash('alert', 'editado');
        
        return redirect()->route('vacina.animal', $request->id_animal);  
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

        if(empty($ids))
        {
            session()->flash('alert', 'excluir_sem_id');
            return redirect()->route('vacina');
        }

        $all = implode(',', $ids);
        Vacina::whereIn('id_vacina', explode(',', $all))->update(['flag_excluido' => 1]);

        # Mensagem
        session()->flash('alert', 'excluidos');
        
        return redirect()->route('vacina');
    }
}
