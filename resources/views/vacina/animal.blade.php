@extends('template')

@section('content')

<a href="{{ route('animal.registrar') }}" class="btn btn-primary">+ Registrar animal</a>

<div class="row">
    
    @foreach($animais as $item)
    
        <div class="col-sm-6 col-md-3 cards">
            <a href="{{ route('vacina.animal', $item['id_animal']) }}" class="card text-decoration-none">
                <img src="{{ asset('img/bg.png') }}" class="card-img-top">
                <h4>{{ $item->nome }}</h4>
                <h6>{{ $item['raca']['raca'] }}</h6>
            </a>
        </div>

    @endforeach
</div>

<span class="p-1">{{ $animais->links() }}</span>

@endsection