@extends('template')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Registrar Raça</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <form action="{{ route('raca.store') }}" method="POST">

                @csrf

                <h6 class="heading-small text-muted mb-4">Informações gerais</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-especie">Espécie</label>
                                <select class="form-control select2" id="input-especie" name="id_especie">
                                    @foreach($especies as $item)
                                        <option value="{{ $item['id_especie']}}">{{ $item['especie'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-raca">Raça</label>
                                <input type="text" id="input-raca" class="form-control" name="raca">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-sm btn-primary" type="submit">Salvar</button>
                    <a class="btn btn-link" href="{{ route('raca') }}">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection