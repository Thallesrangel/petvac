<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario;

class ProprietarioController extends Controller
{

    public function index(Request $request)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Proprietáro' => 'false',
        ];
        
        $proprietarios = Proprietario::where('id_usuario', session('usuario.id_usuario'))
                                      ->where('flag_excluido', 0)
                                      ->paginate(10);

        # Caso preenchido input de pesquisa
        if ($request->get('search')) {
            $proprietarios = $this->search($request);
        }
       
        return view('proprietario.list', [ 'proprietarios' => $proprietarios, 'breadcrumb' => $breadcrumb ] );
    }
    
    # Utilizado no input de pesquisa
    public function search($request)
    {
        $search = $request->get('search');
        $proprietarios = Proprietario::where('nome', 'like','%'.$search.'%')->where('id_usuario', session('usuario.id_usuario'))->paginate(10);
        return $proprietarios;
    }

    public function create()
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Proprietário' => 'proprietario',
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

    public function destroyAll($id)
    {
    
    }
}
