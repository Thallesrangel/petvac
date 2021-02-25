@extends('template-blank')

@section('content')

<div class="container-fluid container-registrar">
        
    <div class="col-sm-12 col-md-3 col-lg-3">
        <form action="{{ route('usuario.store') }}" method="POST">
            
            @csrf
           
            <img class="fluid-img" src="{{ asset('img/logo.png') }}">
            <h3>Cadastre-se</h3>
            <h4>É rapido e fácil.</h4>

            <div class="form-group ">
                <input type="text" class="form-control input-group-text" name="nome" placeholder="Nome">
            </div>
            <div class="form-group ">
                <input type="text" class="form-control input-group-text" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control input-group-text" name="senha" placeholder="Senha">
            </div>
            <div class="form-group">
                <button class="btn btn-entrar form-control" type="submit">Tudo pronto!</button>
                
            </div>
            <a title="Voltar" class="icon-back-login" href="{{ route('login') }}"><i class="bi bi-arrow-left"></i></a>
        </form>
    </div>

</div>

@endsection