<!DOCTYPE>
<html lang="pt-br">
	<head>
		<title>CondoFacil</title>
	 	<meta charset="utf-8">
	 	<link rel="stylesheet" href="/css/bootstrap.min.css">
	 	<link rel="stylesheet" href="/css/formstyle.css">
	 	
	</head>
	<body>
		<div class="container">
			<div class="row painel-portal">
				<!-- Form Name -->
				<div class="panel-titulo">
					<h2>Portal do Condomínio</h2><p>Bem Vindo! Preencha os campos do formulário para cadastrar-se.</p>
				</div>
			</div>
			<form id="login-form" class="form-horizontal col-md-12"  action="{{ route('painel.store') }}" method="POST">
                            {{ csrf_field() }}
				<!-- Nome input -->
				<div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="nome" class="control-label">Nome Completo</label>
				    <input id="inputUser" name="nome" class="form-control" placeholder="Digite seu Nome" type="text">
                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                    @endif
				</div>
				<!-- Email input -->	  
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				    <label for="email" class="control-label">Email</label>
				    <input id="inputEmail" name="email" class="form-control" placeholder="Digite seu E-mail" type="email" >
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
				<!-- Senha [Double] -->
				<div class="form-group">
					<div class="form-group row">
						<div class="col-xs-6{{ $errors->has('senha') ? ' has-error' : '' }}">
							<label for="senha" class="control-label">Senha</label>
							<input id="inputPassword" type="password" name="senha" class="form-control"  placeholder="Digite sua senha">
                                                        @if ($errors->has('senha'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('senha') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
						<div class="col-xs-6{{ $errors->has('senha-confirm') ? ' has-error' : '' }}">
							<label for="senha-confirm" class="control-label">Confirme a Senha</label>
							<input id="inputConfirm" type="password" name="senha-confirm" class="form-control"  placeholder="Confirme a senha">
                                                        @if ($errors->has('senha-confirm'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('senha-confirm') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
					</div>
				</div>
											
				<!-- Button (Cadastro) -->
				<div class="form-group input-sm center-block">
			    	<button type="submit" name="enviar" class="btn btn-acess center-block">Cadastrar</button>
				</div>

				<!-- Back Login -->
				<div class="row linha"><hr></div>
				<div class="row text-center">
					<label><a id="alerta" href="{{ route('login.index') }}">Login</a></label>
		 		</div>
                                
                                <input type="hidden" name="classe" value="Sindico()">
			</form>
		</div>
	</body>
</html>