<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Vacina;

class HomeController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'Início' => 'false',
      
        ];

        $animal_total = Animal::where('id_usuario', session('usuario.id_usuario'))
        ->where('flag_excluido', 0)
        ->count();
       
        $vacina_total = Vacina::where('id_usuario', session('usuario.id_usuario'))
        ->where('flag_excluido', 0)
        ->count();

        return view('home.index',  
        [ 
            'animal_total' => $animal_total, 
            'vacina_total' => $vacina_total,
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function create()
    {
    
    }

    public function store(Request $request)
    {
    
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
