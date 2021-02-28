@extends('template')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Editar Vacina</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <form action="{{ route('vacina.atualizar', $vacina['id_vacina']) }}" method="POST">

                @csrf

                <h6 class="heading-small text-muted mb-4">Informações gerais</h6>
                <div class="pl-lg-4">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-vacina">Vacina *</label>
                                <input type="text" id="input-vacina" class="form-control" name="vacina" value={{ $vacina['vacina'] }} required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-control-label" for="input-dose">Dose *</label>
                                <input type="text" id="input-dose" class="form-control" name="dose" value="{{ $vacina['dose'] }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-data-aplicacao">Data vacinação *</label>
                                <input type="date" id="input-data-aplicacao" class="form-control" name="data_aplicacao" value="{{ $vacina['data_aplicacao'] }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-data-apliacao">Data revacinação</label>
                                <input type="date" id="input-data-apliacao" class="form-control" name="data_revacinacao" value="{{ $vacina['data_revacinacao'] }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-veterinario">Veterinário</label>
                                <input type="text" id="input-veterinario" class="form-control" name="veterinario" value="{{ $vacina['veterinario'] }}">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-control-label" for="input-registro">Registro CRMV</label>
                                <input type="text" id="input-registro" class="form-control" name="registro_crmv" value="{{ $vacina['registro_crmv'] }}">
                            </div>
                        </div>
                    </div>

                    <input type="text" class="invisible" name="id_animal" value={{ $animal['id_animal'] }}>

                    <button class="btn btn-primary" type="submit">Salvar</button>
                    <a class="btn btn-light" href="{{ route('animal') }}">Cancelar</a>

                </div>
                
            </form>
        </div>
    </div>
</div>


@endsection