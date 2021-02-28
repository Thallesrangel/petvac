<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;

class EspecieController extends Controller
{

    public function index(Request $request)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Espécie' => 'false',
        ];
        
        $especies = Especie::where('id_usuario', session('usuario.id_usuario'))
                                      ->where('flag_excluido', 0)
                                      ->paginate(10);

        # Caso preenchido input de pesquisa
        if ($request->get('search')) {
            $especies = $this->search($request);
        }
       
        return view('especie.list', [ 'especies' => $especies, 'breadcrumb' => $breadcrumb ] );
    }
    
    # Utilizado no input de pesquisa
    public function search($request)
    {
        $search = $request->get('search');
        $especies = Especie::where('especie', 'like','%'.$search.'%')->where('id_usuario', session('usuario.id_usuario'))->paginate(10);
        return $especies;
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

        session()->flash('alert', 'registrado');

        return redirect()->route('especie');
    }

    public function show($idEspecie)
    {
    
    }

    public function edit($idEspecie)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Espécie' => 'especie',
            'Editar' => 'false'
        ];

        $especie = Especie::findOrFail($idEspecie)->toArray();
        
        return view('especie.edit', [ 'especie' => $especie, 'breadcrumb' => $breadcrumb ] );
    }

    public function update(Request $request, $idEspecie)
    {
        
        $request->validate([
            'especie' => 'required'
        ]);

        $data = [
            'especie' => $request->especie,
        ];

        Especie::where('id_usuario', session('usuario.id_usuario'))->where('id_especie',$idEspecie)->update($data);

        session()->flash('alert', 'editado');
        
        return redirect()->route('especie');  
    }

    public function destroy($idEspecie)
    {
        $especie = Especie::where('id_usuario', session('usuario.id_usuario'))->findOrFail($idEspecie);

        # caso for um registro padrao = 1, criado pelo administrador, um usuário comum não pode excluí-lo
        if ($especie->flag_padrao == 1) {
            session()->flash('alert', 'excluido_impedido');
            return redirect()->route('especie');
        }

        $especie->flag_excluido = 1;
        $especie->save();

        session()->flash('alert', 'excluido');

        return redirect()->route('especie');
    }
    
    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');

        if(empty($ids))
        {
            session()->flash('alert', 'excluir_sem_id');
            return redirect()->route('especie');
        }

        $all = implode(',', $ids);
        Especie::whereIn('id_especie', explode(',', $all))->update(['flag_excluido' => 1]);

        # Mensagem
        session()->flash('alert', 'excluidos');
        
        return redirect()->route('especie');
    }
}
