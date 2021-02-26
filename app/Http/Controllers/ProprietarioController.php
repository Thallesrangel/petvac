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
            'cpf' => 'required',
            'email' => 'required'
        ]);
        
        $proprietario = new Proprietario();

        $proprietario->id_usuario = session('usuario.id_usuario');
        $proprietario->nome = $request->nome;
        $proprietario->cpf = $request->cpf;
        $proprietario->email = $request->email;
        $proprietario->save();

        session()->flash('alert', 'registrado');

        return redirect()->route('proprietario');
    }

    public function show($id)
    {
    
    }

    public function edit($idProprietario)
    {
        $breadcrumb = [
            'Início' => 'painel',
            'Proprietário' => 'proprietario',
            'Editar' => 'false'
        ];

        $proprietario = Proprietario::findOrFail($idProprietario)->toArray();
        
        return view('proprietario.edit', [ 'proprietario' => $proprietario, 'breadcrumb' => $breadcrumb ] );
    }


    public function update(Request $request, $idProprietario)
    {
        
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required'
        ]);

        
        $data = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email
        ];

        Proprietario::where('id_proprietario',$idProprietario)->update($data);

        session()->flash('alert', 'editado');
        
        return redirect()->route('proprietario');  
    }

    public function destroy($idProprietario)
    {
        $proprietario = Proprietario::where('id_usuario', session('usuario.id_usuario'))->findOrFail($idProprietario);
        $proprietario->flag_excluido = 1;
        $proprietario->save();

        session()->flash('alert', 'excluido');

        return redirect()->route('proprietario');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        $all = implode(',', $ids);
        Proprietario::whereIn('id_proprietario', explode(',', $all))->update(['flag_excluido' => 1]);

        # Mensagem
        session()->flash('alert', 'excluidos');
        
        return redirect()->route('proprietario');
    }
}
