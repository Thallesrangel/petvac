<!DOCTYPE html>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="pt-br">
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, shrink-to-fit=no">
        <meta name="author" content="Thalles Rangel Lopes">
        <meta name="reply-to" content="rangelthr@gmail.com">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
        <title>Petvac - NOVO</title>
        <link rel='icon' href="{{ asset('img/favicon.png') }}" type='image/x-icon' sizes="16x16" />
</head>
    <body class="body-painel">
        @include('includes.message')
        <div class="container-fluid">  
            @include('includes.navbar')
            
            <div class="row">
                <div class="col-md-3 div-sidebar">
                    @include('includes.sidebar')
                </div>

                <div class="col-sm-12 col-md-9">
                    <div class="container-fluid">
                        @include('includes.breadcrumb')
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>