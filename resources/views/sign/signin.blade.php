@extends('template-blank')

@section('content')

<div class="container-fluid h-100">
    <div class="row h-100">
        
        <div class="col-md-6 col-login-left">
            <div>
                <img class="img-fluid" src="{{ asset('img/logo.png')}}">
                <h4>Ajuda você a cuidar do seus amigos.<h4>
            </div>
        </div>

        <div class="col-md-6 col-login-right">
                <form action="{{ route('login.logar') }}" method="POST" class="div-login-form">
                    @csrf
                    <h2>Login</h2>

                    <div class="form-group ">
                        <input type="email" name="email" class="form-control input-group-text" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" class="form-control input-group-text" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-entrar form-control" type="submit">Entrar</button>
                    </div>
                    
                    <a href="#">Esqueceu a senha?</a>

                    <hr>

                    <div class="form-group">
                        <a href="{{ route('usuario.registrar') }}" class="btn btn-registrar text-white">Criar conta</a>
                    </div>
                </form>
        </div>
        
    </div>
</div>
@endsection