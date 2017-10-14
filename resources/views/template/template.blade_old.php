<?php if (!isset($_SESSION)) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        
        <!-- Bootstrap & CSS Bibliotecas -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/formstyle.css" rel="stylesheet">
        <link href="/css/font-awesome/css/font-awesome.css" rel="stylesheet">
        
        <!-- JQuery Bibliotecas -->
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="/js/ckeditor/ckeditor.js"></script>

        <script>
            jQuery(function ($) {
                $("#telUsuario").mask("(99) 99999-9999");
                $("#cepUsuario").mask("99999-999");
                $("#cpfUsuario").mask("999.999.999-99");
                $("#cnpjUsuario").mask("99.999.999/9999-99");
            });
        </script>
    </head>
    <body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Condo Fácil</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span> {{$_SESSION['usuario']->nome}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('condominio.index')}}">Cadastrar Condomínio</a></li>
                            <li><a href="{{route('perfil.editar')}}">Editar</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('dashboard.logout')}}">Sair <span class="glyphicon glyphicon-log-in"></span></a>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <section id="main">
        <div class="container-fluid">
            <div class="msg-sys">
                @yield('painelMensagens')
            </div>
            <div class="dash col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item active main-color-bg">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp; Dashboard
                    </a>
                    <a href="{{route('avisos.index')}}" class="list-group-item"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>&nbsp; Avisos <span class="badge">0</span></a>
                    <a href="{{route('condomino.index')}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Condôminos <span class="badge">0</span></a>
                    <a href="{{route('areaComun.cadastro')}}" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp; Áreas Comuns <span class="badge">0</span></a>
                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp; Contate o Síndico <span class="badge">0</span></a>
                </div>
            </div>

            @yield('content')

        </div><!-- Container-Fluid -->
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        CKEDITOR.replace( 'mensagem' );
    </script>
    </body>
</html>
