<!DOCTYPE>
<html lang="pt-br">
	<head>
		<title>CondoFacil</title>
	 	<meta charset="utf-8">
	 	<link rel="stylesheet" href="/css/bootstrap.min.css">
	 	<link rel="stylesheet" href="/css/formstyle.css">
	</head>
	<body>
		<div id="wrapper" class="container">
			<div class="row">
				<div class="col-md-12 painel-portal">
					<div class="painel-titulo">
						<h2>Portal do Condomínio</h2><p>Bem Vindo! Preencha os campos do formulário para acesso ao Portal</p>
					</div>
				</div>
			</div>
			<div class="row">  
				<form class="form-horizontal" action="{{ route('painel.store') }}" method="POST">
	                            {{ csrf_field() }}
					<!-- Nome input -->
					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="nome" class="label-control">Nome Completo</label>
                        <input id="inputUser" name="nome" class="form-control " value="{{old('nome')}}" placeholder="Digite seu Nome" type="text">
		                @if ($errors->has('nome'))
		                <div class="row">
		                    <span class="help-block">
		                        <strong>{{ $errors->first('nome') }}</strong>
		                    </span>
		                </div>
		                @endif
					</div>
					<!-- Email input -->	  
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					    <label for="email" class="control-label">Email</label>
				    	<input id="inputEmail" name="email" class="form-control" value="{{old('email')}}"  placeholder="Digite seu E-mail" type="email">
                        @if ($errors->has('email'))
                        <div class="row">
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        </div>
                        @endif
	                </div>

					<!-- Senha [Double] -->
					<div class="form-group {{ $errors->has('senha') ? ' has-error' : '' }}">
						<label for="senha" class="control-label">Senha</label>
						<input id="inputPassword" type="password" name="senha" class="form-control" value="{{old('senha')}}"  placeholder="Digite sua senha">
                        @if ($errors->has('senha'))
                        <div class="row">
                            <span class="help-block">
                                <strong>{{ $errors->first('senha') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
					<div class="form-group {{ $errors->has('senha-confirm') ? ' has-error' : '' }}">
						<label for="senha-confirm" class="control-label">Confirme a Senha</label>
						<input id="inputConfirm" type="password" name="senha-confirm" class="form-control" value="{{old('senha-confirm')}}"  placeholder="Confirme a senha"/>
                        @if ($errors->has('senha-confirm'))
                        <div class="row">
                            <span class="help-block">
                                <strong>{{ $errors->first('senha-confirm') }}</strong>
                            </span>
                        </div>
                        @endif
               		</div>
												
					<!-- Button (Cadastro) -->
					<div class="form-group col-md-12">
				    	<button type="submit" name="enviar" class="btn-acess btn btn-success">Cadastrar</button>
					</div>
                    <input type="hidden" name="classe" value="Sindico">
				</form>

				<!-- Back Login -->
				<div class="row"><hr></div>
				<div class="row text-center">
					<label><a href="{{ route('login.index') }}">Login</a></label>
		 		</div>
			</div>
		</div>
	</body>
</html>