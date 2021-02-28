@extends('template')

@section('content')
    <div class="home">
        <h5>Registros totais</h5>

        <div class="col-12">
           
              <div class="card-body">
                <div class="row">

                    <div class="col-lg-6 col-xl-3 col-sm-6 col-sm-12 cards-home">
                        <div class="d-flex align-items-center">
                            <span class="card-icon d-flex justify-content-center mr-3">
                                <i class="bi bi-heart"></i>
                            </span>
                            <div class="text-right">
                                <h3>{{ $animal_total }}</h3>
                                <p>Animais</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12 cards-home">
                        <div class="d-flex align-items-center">
                            <span class="card-icon d-flex justify-content-center mr-3">
                                <i class="bi bi-shield"></i>
                            </span>
                            <div class="text-right">
                                <h3>{{ $vacina_total }}</h3>
                                <p>Vacinas</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12 cards-home">
                        <div class="d-flex align-items-center">
                            <span class="card-icon d-flex justify-content-center mr-3">
                                <i class="bi bi-droplet"></i>
                            </span>
                            <div class="text-right">
                                <h3>0</h3>
                                <p>Vermifugos</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12 cards-home">
                        <div class="d-flex align-items-center">
                            <span class="card-icon d-flex justify-content-center mr-3">
                                <i class="bi bi-exclamation-triangle"></i>
                            </span>
                            <div class="text-right">
                                <h3>0</h3>
                                <p>Parasitas</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <h5>Médias</h5>

    </div>
@endsection