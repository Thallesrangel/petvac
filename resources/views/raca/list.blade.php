@extends('template')

@section('content')

<div class="container-fluid div-list">
    
    <div class="row">
        <div class="col-md-6 text-md-left text-center">
            <h4>Raças</h4>
        </div>
        <div class="col-md-4 ml-auto form-inline">
            <form method="get">
                @csrf
                @method('get')
                <input name="search" class="form-control form-control-sm mr-sm-2" type="search" placeholder="Pesquisar">
                <button formaction="{{ route('raca') }}" class="btn btn btn-light my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="container div-main-crud">
    
        <form method="post">
            @csrf
            @method('DELETE')
            
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6 text-md-left">
                    <a href="{{ route('raca.registrar') }}" class="btn btn-sm btn-light" title="Registrar"><i class="bi bi-plus-square"></i></a>
                    <a href="#" class="btn btn-sm btn-light" title="Imprimir"><i class="bi bi-printer"></i></a>
                    <button formaction="{{ route('raca.excluirvarios') }}" type="submit" class="btn btn-sm btn-light" title="Excluir selecionados"> <i class="bi bi-trash"></i></button>
                </div>
            </div>
        
            <table class="table table-sm table-hover table-borderless">
                <thead class="table-head">
                    <tr>
                        <th title="Selecionar todos"><input type="checkbox" class="selectall"/></th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($racas as $item)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $item['id_raca'] }}" class="selectbox"></td>
                            <td>{{ $item['especie']['especie'] }}</td>
                            <td>{{ $item['raca'] }}</td>
                            <td>
                                <a href="{{ route('raca.editar', $item['id_raca']) }}" class="icon-crud"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('raca.excluir', $item['id_raca']) }}" class="icon-crud"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot class="table-head">
                    <tr>
                        <th title="Selecionar todos"><input type="checkbox" class="selectall2"/></th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <span class="p-1">{{ $racas->links() }}</span>
           
        </form>
        
    </div>
</div>


@endsection