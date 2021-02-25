@extends('template')

@section('content')

<div class="container-fluid div-list">
    
    <div class="row">
        <div class="col-md-6 text-md-left text-center">
            <h4>Proprietários</h4>
        </div>
        <div class="col-md-6 text-md-right text-center">
            <a href="{{ route('proprietario.registrar') }}" class="btn btn-sm btn-secondary"><i class="bi bi-plus"></i> <span>Registrar</span></a>
            <a href="#" class="btn btn-sm btn-secondary"><i class="bi bi-printer"></i> <span>Imprimir</span></a>
        </div>
    </div>
    <hr>
    <div class="container div-main-crud">
    
        <form method="post">
            @csrf
            @method('DELETE')
            
            <div class="row align-items-center">
                <div clas="col-md-2">
                    <button formaction="{{ route('proprietario.excluirvarios') }}" type="submit" class="btn btn-sm btn-list-destroy-all" href="#"> <i class="bi bi-trash"></i> <span>Excluir selecionados</span></button>
                </div>

                <div class="col-md-4 ml-auto form-inline">
                    <form method="get">
                        @csrf
                        @method('get')
                        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Pesquisar">
                        <button formaction="{{ route('proprietario') }}" class="btn btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        
            <table class="table table-sm table-hover table-borderless">
                <thead class="table-head">
                    <tr>
                        <th title="Selecionar todos"><input type="checkbox" class="selectall"/></th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proprietarios as $item)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $item['id_proprietario'] }}" class="selectbox"></td>
                            <td>{{ $item['nome'] }}</td>
                            <td>
                                <a href="{{ $item['id_proprietario'] }}" class="icon-crud" href=""><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('proprietario.excluir', $item['id_proprietario'])}}" class="icon-crud" href=""><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot class="table-head">
                    <tr>
                        <th title="Selecionar todos"><input type="checkbox" class="selectall2"/></th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <span class="p-1">{{ $proprietarios->links() }}</span>
           
        </form>
        
    </div>
</div>


@endsection