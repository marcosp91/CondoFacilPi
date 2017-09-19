<?php if(!isset($_SESSION)) { session_start(); } ?>
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

      jQuery(function($){
         $("#telUsuario").mask("(99) 99999-9999");
         $("#cepUsuario").mask("99999-999");
         $("#cnpjUsuario").mask("99.999.999/9999-99");
      });
    </script>
  </head>
  <body>

     <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
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
          <div class="alert alert-info text-center" role="alert">
            <strong>Seja bem vindo!</strong> Você já pode <a href="/layoutCondo/perfil.blade.php" class="alert-link">editar seu usuário</a> agora.<a href="#" class="close" data-dismiss="alert">&times;</a>
          </div>
          <div class="alert alert-warning text-center" role="alert">
            <strong>Bem Vindo!</strong> Podemos começar <a href="layoutCondo/condominios.blade.php" class="alert-link">cadastrando seu condominio</a>.<a href="#" class="close" data-dismiss="alert">&times;</a>
          </div>
        </div>
        <div class="dash col-md-3">
          <div class="list-group">
            <a href="index.html" class="list-group-item active main-color-bg">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Dashboard
            </a>
            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Avisos <span class="badge">12</span></a>
            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Cadastro Condôminos <span class="badge">33</span></a>
            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Áreas Comuns <span class="badge">203</span></a>
            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Contate o Síndico <span class="badge">203</span></a>
          </div>
        </div>
        <div class="col-md-9">
          <!-- Editar Perfil -->
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cadastrar Condomínio</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{route('condominio.cadastro')}}">
                    {{ csrf_field() }}
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-xs-4 col-md-4{{ $errors->has('nome') ? ' has-error' : '' }}">
						  	<label for="nome" class="control-label">Nome:</label>
						  	<input type="text" id="nomeUsuario" name="nome" class="form-control" placeholder="Nome do Condominio">
                                                        @if ($errors->has('nome'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('nome') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
						<div class="col-xs-6 col-md-4{{ $errors->has('cnpj') ? ' has-error' : '' }}">
						  	<label for="cnpj" class="control-label">CNPJ:</label>
						  	<input type="text" id="cnpjUsuario" name="cnpj" class="form-control" placeholder="CNPJ">
                                                        @if ($errors->has('cnpj'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('cnpj') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
						<div class="col-xs-6 col-md-4{{ $errors->has('telefone') ? ' has-error' : '' }}">
                                                        <label for="telefone" class="control-label">Telefone:</label>
                                                        <input type="text" id="telUsuario" name="telefone" class="form-control" placeholder="Telefone">
                                                        @if ($errors->has('telefone'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('telefone') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
					</div>
					<div class="row">
						<div class="col-xs-2{{ $errors->has('tipo') ? ' has-error' : '' }}">
						  <label for="tipo" class="control-label">Tipo:</label>
							<select name="tipo" class="form-control">
								<option value="" disabled selected="selected">Tipo</option>
								<option value="Avenida">Avenida</option>
								<option value="Conjunto">Conjunto</option>
								<option value="Estrada">Estrada</option>
								<option value="Loteamento">Loteamento</option>
								<option value="Praça">Praça</option>
								<option value="Quadra">Quadra</option>
								<option value="Rodovia">Rodovia</option>
								<option value="Rua">Rua</option>
								<option value="Servidao">Servidão</option>
								<option value="Travessa">Travessa</option>
							</select>	
                                                        @if ($errors->has('tipo'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('tipo') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
						<div class="col-xs-5{{ $errors->has('endereco') ? ' has-error' : '' }}">
						  <label for="endereco" class="control-label">Endereço:</label>
						  <input type="text" id="numUsuario" name="endereco" class="form-control" placeholder="Numero">
                                                    @if ($errors->has('endereco'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('endereco') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
						<div class="col-xs-2{{ $errors->has('numero') ? ' has-error' : '' }}">
                                                    <label for="numero" class="control-label">Num:</label>
                                                    <input type="text" id="numUsuario" name="numero" class="form-control" placeholder="Numero">
                                                    @if ($errors->has('endereco'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('endereco') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
						<div class="col-xs-3{{ $errors->has('complemento') ? ' has-error' : '' }}">
						  <label for="complemento" class="control-label">Complemento:</label>
							<select name="complemento" class="form-control">
                                                            <option value="" disabled selected="selected">Escolha o complemento</option>
								<option value="Predial">Predial</option>
								<option value="Residencial">Residencial</option>
							</select>
                                                    @if ($errors->has('complemento'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('complemento') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
					</div>
					<div class="row">
							<div class="col-xs-4{{ $errors->has('cidade') ? ' has-error' : '' }}">
								<label for="cidade" class="control-label">Cidade:</label>
								<input type="text" id="telUsuario" name="cidade" class="form-control" placeholder="Cidade">
                                                                @if ($errors->has('cidade'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('cidade') }}</strong>
                                                                    </span>
                                                                @endif
                                                        </div>
						<div class="col-xs-4{{ $errors->has('estado') ? ' has-error' : '' }}">
						  <label for="estado" class="control-label">UF:</label>
						  <select name="estado" class="form-control">
							<option value="" selected="selectd" disabled>Escolha seu Estado</option>
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
						<div class="col-xs-4{{ $errors->has('cep') ? ' has-error' : '' }}">
                                                    <label for="cep" class="control-label">CEP:</label>
                                                    <input type="text" id="cepUsuario" name="cep" class="form-control" placeholder="CEP">
                                                    @if ($errors->has('cep'))
                                                        <span class="help-block">
                                                                <strong>{{ $errors->first('cep') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
					</div> <!-- Row Cidade -->
					<div class="text-center">
						<button type="submit" class="btn btn-primary" style="margin-top: 15px;">Atualizar Cadastro</button>
					</div>
                </form>
            </div><!-- Painel Body -->
          </div><!-- Painel Default -->
        </div><!-- Coluna Painel Form -->
      </div><!-- Container-Fluid -->
    </section>
    <footer id="footer">
     <p>Condo Fácil Software, &copy; 2017</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
