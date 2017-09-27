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
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

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
                                <li><a href="{{route('dashboard.condominio')}}">Cadastrar Condomínio</a></li>
                                <li><a href="{{route('dashboard.perfil')}}">Editar</a></li>
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
                    <div class="alert alert-info text-center" role="alert">
                        <strong>Seja bem vindo!</strong> Você já pode <a href="/dashCondo/admin/index.html" class="alert-link">editar seu usuário</a> agora.<a href="#" class="close" data-dismiss="alert">&times;</a>
                    </div>
                    <div class="alert alert-warning text-center" role="alert">
                        <strong>Bem Vindo!</strong> Podemos começar <a href="" class="alert-link">cadastrando seu condominio</a>.<a href="#" class="close" data-dismiss="alert">&times;</a>
                    </div>
                </div>
                <div class="dash col-md-3">
                    <div class="list-group">
                        <a href="index.html" class="list-group-item active main-color-bg">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Dashboard
                        </a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Avisos <span class="badge">0</span></a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Cadastro Condôminos <span class="badge">0</span></a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Áreas Comuns <span class="badge">0</span></a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Contate o Síndico <span class="badge">0</span></a>
                    </div>
                </div>
                <div class="col-md-9"><!-- Coluna Painel Form -->
                    <!-- Editar Perfil -->
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Perfil</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                </div>
                            </div>
                        </div><!-- Painel Body -->
                    </div><!-- Painel Default -->
                </div><!-- Coluna Painel Form -->
            </div><!-- Container-Fluid -->
        </section>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
