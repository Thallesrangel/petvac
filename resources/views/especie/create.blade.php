@extends('template')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Registrar Espécie</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <form action="{{ route('especie.store') }}" method="POST">

                @csrf

                <h6 class="heading-small text-muted mb-4">Informações gerais</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-especie">Espécie *</label>
                                <input type="text" id="input-especie" class="form-control" name="especie" required>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Salvar</button>
                    <a class="btn btn-light" href="{{ route('especie') }}">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection