@extends('template')

@section('content')
    <div class="container detalhes">
        <div class="detalhes-div">
            <div class="perfil">
                <img class="img-fluid" src="{{ asset('img/bg.png') }}">
                <h3>{{ $animal['nome'] }}</h3>
                <p>{{ $animal['identificacao'] }}</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{ route('animal.editar', $animal['id_animal']) }}" class="btn btn-light">Editar perfil</a></li>
                    <li class="list-inline-item"><a href="{{ route('animal.excluir', $animal['id_animal']) }}" class="btn btn-light">Excluir perfil</a></li>
                <ul>
            </div>

            <div class="row">
                <ul class="list-unstyled">
                    <li title="Data de nascimento"><i class="bi bi-calendar4-event"></i> {{ $animal['data_nascimento'] }}</li>
                    <li title="Proprietário"><i class="bi bi-bookmark"></i> {{ $animal['proprietario']['nome'] }}</li>
                </ul>
            </div>

            <h3>Características:</h3>
            <div class="row">
                <div class="col-md-2">
                    <div class="detalhes-card">
                        <h5>Sexo:</h5>
                        <h6> {{ $animal['flag_sexo'] == '1' ? 'Macho' : 'Fêmea'  }}</h6>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="detalhes-card">
                        <h5>Espécie:</h5>
                        <h6>{{ $animal['especie']['especie'] }}</h6>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="detalhes-card">
                        <h5>Raça:</h5>
                        <h6>{{ $animal['raca']['raca'] }}</h6>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="detalhes-card">
                        <h5>Cor:</h5>
                        <h6>{{ $animal['cor'] }}</h6>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="detalhes-card">
                        <h5>Filhotes:</h5>
                        <h6>{{ $animal['flag_filhote'] == '1' ? 'Não' : 'Sim'  }}</h6>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="detalhes-card">
                        <h5>Registro:</h5>
                        <h6>ESTÁTICO</h6>
                    </div>
                </div>

            </div>

            @if(isset($animal['microchip']))
                <h3>Microchip:</h3>
                <div class="row">
                    
                    <div class="col-md-2">
                        <div class="detalhes-card">
                            <h5>Código:</h5>
                            <h6>{{ $animal['microchip'] }}</h6>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="detalhes-card">
                            <h5>Implantação:</h5>
                            <h6>{{ $animal['data_implantacao'] }}</h6>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="detalhes-card">
                            <div class="Local Implantação:">
                                <h5>Registro:</h5>
                                <h6>{{ $animal['local_implantacao'] }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        </div>

    </div>
@endsection