<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raca;
use App\Models\Especie;

class RacaController extends Controller
{

    public function index(Request $request)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Raças' => 'false',
        ];
        
        $racas = Raca::where('id_usuario', session('usuario.id_usuario'))
                                      ->where('flag_excluido', 0)
                                      ->with('especie')
                                      ->paginate(10);


        # Caso preenchido input de pesquisa
        if ($request->get('search')) {
            $racas = $this->search($request);
        }
       
        return view('raca.list', [ 'racas' => $racas, 'breadcrumb' => $breadcrumb ] );
    }
    
    # Utilizado no input de pesquisa
    public function search($request)
    {
        $search = $request->get('search');
        $racas = Raca::where('raca', 'like','%'.$search.'%')->where('id_usuario', session('usuario.id_usuario'))->paginate(10);
        return $racas;
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
            'id_especie' => 'required',
            'raca' => 'required',
        ]);
        
        $raca = new Raca();

        $raca->id_usuario = session('usuario.id_usuario');
        $raca->raca = $request->raca;
        $raca->id_especie = $request->id_especie;
        $raca->save();

        session()->flash('alert', 'registrado');

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

    public function destroy($idRaca)
    {
        $raca = Raca::where('id_usuario', session('usuario.id_usuario'))->findOrFail($idRaca);
        $raca->flag_excluido = 1;
        $raca->save();

        session()->flash('alert', 'excluido');

        return redirect()->route('raca');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        $all = implode(',', $ids);
        Raca::whereIn('id_raca', explode(',', $all))->update(['flag_excluido' => 1]);

        # Mensagem
        session()->flash('alert', 'excluidos');
        
        return redirect()->route('raca');
    }
}
