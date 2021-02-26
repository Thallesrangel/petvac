@extends('template')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Registrar Animal</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <form action="{{ route('animal.store') }}" method="POST">

                @csrf

                <h6 class="heading-small text-muted mb-4">Informações gerais</h6>
                <div class="pl-lg-4">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-nome">Nome *</label>
                                <input type="text" id="input-nome" class="form-control" name="nome" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-proprietario">Proprietário *</label>
                                <select class="form-control select2" id="input-proprietario" name="id_proprietario" required>
                                    @foreach($proprietarios as $item)
                                        <option value="{{ $item['id_proprietario']}}">{{ $item['nome'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-identificacao">Identificação *</label>
                                <input type="text" id="input-identificacao" class="form-control" name="identificacao" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-data-nascimento">Data nascimento *</label>
                                <input type="date" id="input-data-nascimento" class="form-control" name="data_nascimento" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-especie">Espécie *</label>
                                <select class="form-control select2" id="input-especie" name="id_especie" required>
                                    @foreach($especies as $item)
                                        <option value="{{ $item['id_especie']}}">{{ $item['especie'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-raca">Raça *</label>
                                <select class="form-control select2" id="input-raca" name="id_raca" required>
                                    @foreach($racas as $item)
                                        <option value="{{ $item['id_raca']}}">{{ $item['raca'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-cor">Cor *</label>
                                <input type="text" id="input-cor" class="form-control" name="cor" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3 form-group">
                            
                            <label class="form-control-label" for="input-sexo">Sexo *</label>
                            <br>
                            <div id="castrado" class="custom-control custom-radio float-left mr-1">
                                <input type="radio" id="sexoS" name="flag_sexo" class="custom-control-input" value="1" checked>
                                <label class="custom-control-label" for="sexoS">Macho</label>
                            </div>
            
                            <div class="custom-control custom-radio float-left ml-1">
                                <input type="radio" id="sexoN" name="flag_sexo" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="sexoN" checked>Fêmea</label>
                            </div>
                        </div>

                        <div class="col-md-3 form-group">
                            
                            <label class="form-control-label" for="input-castrado">Castrado? *</label>
                            <br>
                            <div id="castrado" class="custom-control custom-radio float-left mr-1">
                                <input type="radio" id="castradoS" name="flag_castrado" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="castradoS">Sim</label>
                            </div>
            
                            <div class="custom-control custom-radio float-left ml-1">
                                <input type="radio" id="castradoN" name="flag_castrado" class="custom-control-input" value="2" checked>
                                <label class="custom-control-label" for="castradoN" checked>Não</label>
                            </div>
                        </div>

                        <div class="col-md-3 form-group">
                            
                            <label class="form-control-label" for="input-filhotes">Possui Filhotes? *</label>
                            <br>
                            <div id="castrado" class="custom-control custom-radio float-left mr-1">
                                <input type="radio" id="filhoteS" name="flag_filhote" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="filhoteS">Sim</label>
                            </div>
            
                            <div class="custom-control custom-radio float-left ml-1">
                                <input type="radio" id="filhoteN" name="flag_filhote" class="custom-control-input" value="2" checked>
                                <label class="custom-control-label" for="filhoteN" checked>Não</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>

                <h6 class="heading-small text-muted mb-4 mt-3">Informações gerais</h6>
                <div class="pl-lg-4">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-microchip">microchip</label>
                                <input type="text" id="input-microchip" class="form-control" name="microchip">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-data-implantacao">Data implantação</label>
                                <input type="date" id="input-data-implantacao" class="form-control" name="data_implantacao">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-local-implantacao">Local de implantação</label>
                                <input type="text" id="input-local-implantacao" class="form-control" name="local_implantacao">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Salvar</button>
                    <a class="btn btn-link" href="{{ route('animal') }}">Cancelar</a>

                </div>

            </form>
        </div>
    </div>
</div>

@endsection