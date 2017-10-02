<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Area | Dashboard</title>
        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script>

            jQuery(function ($) {
                $("#telUsuario").mask("(99) 99999-9999");
                $("#cepUsuario").mask("99999-999");
                $("#cpfUsuario").mask("999.999.999-99");
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
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                {{$_SESSION['usuario']->nome}}<b class="caret"></b>
                                <img src="/img/portfolio/image-user.png" class="img-circle special-img">
                            </a>
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
                <div class="msg-sys col-md-12">
                    <div class="alert alert-info text-center" role="alert">
                        <strong>Seja bem vindo!</strong> Você já pode <a href="/dashCondo/admin/index.html" class="alert-link">editar seu usuário</a> agora.<a href="#" class="close" data-dismiss="alert">&times;</a>
                    </div>
                    <div class="alert alert-warning text-center" role="alert">
                        <strong>Bem Vindo!</strong> Podemos começar <a href="/dashCondo/admin/condominios.html" class="alert-link">cadastrando seu condominio</a>.<a href="#" class="close" data-dismiss="alert">&times;</a>
                    </div>
                </div>
                <div class="dash col-md-3">
                    <div class="panel panel-default">
                        <a href="#" class="list-group-item active main-color-bg">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Dashboard
                        </a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Avisos <span class="badge">0</span></a>
                        <a href="{{route('condomino.cadastro')}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Cadastro Condôminos <span class="badge">0</span></a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Áreas Comuns <span class="badge">0</span></a>
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Contate o Síndico <span class="badge">0</span></a>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-xs-12 col-md-6"><!-- Coluna Painel Form -->
                    <!-- Editar Perfil -->
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cadastrar Condômino</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{route('painel.store')}}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-6 col-md-6{{ $errors->has('nome') ? ' has-error' : '' }}">
                                        <label for="nomeUsuario" class="control-label">Nome Completo:</label>
                                        <input type="text" id="nomeUsuario" name="nome" class="form-control" placeholder="Nome Completo" value="">
                                        @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="emailUsuario" class="control-label">Email:</label>
                                        <input type="text" id="emailUsuario" name="email" class="form-control" placeholder="Email" value="">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-md-6{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                        <label for="cpfUsuario" class="control-label">CPF:</label>
                                        <input type="text" id="cpfUsuario" name="cpf" class="form-control" placeholder="CPF" value="{{$_SESSION['usuario']->cpf}}">
                                        @if ($errors->has('cpf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cpf') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-md-6{{ $errors->has('telefone') ? ' has-error' : '' }}">
                                        <label for="tel" class="control-label">Telefone:</label>
                                        <input type="text" id="telUsuario" name="telefone" class="form-control" placeholder="Telefone" value="{{$_SESSION['usuario']->telefone}}">
                                        @if ($errors->has('telefone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-md-3{{ $errors->has('complemento') ? ' has-error' : '' }}">
                                        <label for="complemento" class="control-label">Complemento:</label>
                                        <select name="complemento" class="form-control">
                                            <option value=""  selected="selected" disabled>Escolha</option>
                                            <option value="Avenida">Avenida</option>
                                            <option value="Condomínio">Condomínio</option>
                                            <option value="Conjunto">Conjunto</option>
                                            <option value="Conjunto">Conjunto</option>
                                            <option value="Estrada">Estrada</option>
                                            <option value="Loteamento">Loteamento</option>
                                            <option value="Praça">Praça</option>
                                            <option value="Quadra">Quadra</option>
                                            <option value="Residencial">Residencial</option>
                                            <option value="Rodovia">Rodovia</option>
                                            <option value="Rua">Rua</option>
                                            <option value="Servidao">Servidão</option>
                                            <option value="Travessa">Travessa</option>
                                        </select> 
                                        @if ($errors->has('complemento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('complemento') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-md-5{{ $errors->has('endereco') ? ' has-error' : '' }}">
                                        <label for="endUsuario" class="control-label">Endereço:</label>
                                        <input type="text" id="endUsuario" name="endereco" class="form-control" placeholder="Endereço" value="{{$_SESSION['usuario']->endereco}}"/> 
                                        @if ($errors->has('endereco'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('endereco') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                     <div class="col-xs-6 col-md-2{{ $errors->has('bloco') ? ' has-error' : '' }}">
                                        <label for="blocoUsuario" class="control-label">Bloco:</label>
                                        <input type="text" id="blocoUsuario" name="bloco" class="form-control" placeholder="Bloco" value="{{$_SESSION['usuario']->bloco}}"/> 
                                        @if ($errors->has('bloco'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bloco') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-md-2{{ $errors->has('num_residencia') ? ' has-error' : '' }}">
                                        <label for="numUsuario" class="control-label">Num:</label>
                                        <input type="text" id="numUsuario" name="num_residencia" class="form-control" placeholder="Numero" value="{{$_SESSION['usuario']->num_residencia}}">
                                        @if ($errors->has('num_residencia'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('num_residencia') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <!--div>
                                  <div class="row">-->
                                    <div class="col-xs-6 col-md-4{{ $errors->has('cidade') ? ' has-error' : '' }}">
                                        <label for="cidadeUsuario" class="control-label">Cidade:</label>
                                        <input type="text" id="telUsuario" name="cidade" class="form-control" placeholder="Cidade" value="{{$_SESSION['usuario']->cidade}}">
                                        @if ($errors->has('cidade'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cidade') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-md-4{{ $errors->has('estado') ? ' has-error' : '' }}">
                                        <label for="estado" class="control-label">UF:</label>
                                        <select name="estado" class="form-control">
                                            <option value="" selected="selectd" disabled>Escolha</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                        @if ($errors->has('estado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('estado') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-md-4{{ $errors->has('cep') ? ' has-error' : '' }}">
                                        <label for="cep" class="control-label">CEP:</label>
                                        <input type="text" id="cepUsuario" name="cep" class="form-control" placeholder="CEP" value="{{$_SESSION['usuario']->cep}}">
                                        @if ($errors->has('cep'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cep') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Cadastrar</button>
                                </div>
                                <input type="hidden" name="id" value="{{$_SESSION['usuario']->id}}">
                                <input type="hidden" name="classe" value="Condomino">
                            </form>
                        </div><!-- Painel Body -->
                    </div><!-- Painel Default -->
                </div><!-- Coluna Painel Form -->
            </div><!-- Container-Fluid -->
        </section>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

    </body>
</html>
