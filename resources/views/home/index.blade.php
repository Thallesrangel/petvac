@extends('template')

@section('content')
    <div class="home">
        <h5>Registros totais</h5>

        <div class="row">
         
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  
                  <div class="card-body">
                    <div class="row">
                     
                      <div class="col-auto">
                        <div class="card-icon text-center">
                          <i class="bi bi-heart"></i>
                        </div>
                      </div>
                      <div class="col text-right">
                        <span class="h3 font-weight-bold mb-0">{{ $animal_total }}</span>
                        <p class="card-title text-muted mb-0">Animais</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                
                  <div class="card-body">
                    <div class="row">
                     
                      <div class="col-auto">
                        <div class="card-icon text-center">
                            <i class="bi bi-shield"></i>
                        </div>
                      </div>
                      <div class="col text-right">
                        <span class="h3 font-weight-bold mb-0">{{ $vacina_total }}</span>
                        <p class="card-title text-muted mb-0">Vacinas</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                
                  <div class="card-body">
                    <div class="row">
                     
                      <div class="col-auto">
                        <div class="card-icon text-center">
                            <i class="bi bi-droplet"></i>
                        </div>
                      </div>
                      <div class="col text-right">
                        <span class="h3 font-weight-bold mb-0">10</span>
                        <p class="card-title text-muted mb-0">Vermifugos</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                
                  <div class="card-body">
                    <div class="row">
                     
                      <div class="col-auto">
                        <div class="card-icon text-center">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                      </div>
                      <div class="col text-right">
                        <span class="h3 font-weight-bold mb-0">2</span>
                        <p class="card-title text-muted mb-0">Parasitas</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

          </div>
        <h5>Médias</h5>

    </div>
@endsection