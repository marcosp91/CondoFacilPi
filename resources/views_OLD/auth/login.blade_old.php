<!DOCTYPE>
<html lang="pt-br">
	<head>
		<title>CondoFacil</title>
	 	 <meta charset="utf-8">
	  	<link rel="stylesheet" href="/css/bootstrap.min.css">
	  	<link rel="stylesheet" href="/css/formstyle.css">

	  	<script src="/js/jquery-3.2.1.min.js"></script>
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script src="/js/bootstrap.min.js"></script>
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
				<form id="login-form" class="form-horizontal" action="{{route('login.autentica')}}" method="POST">
				{{ csrf_field() }}
				@if(session('mensagemERRO'))
		            <div class="row">
			            <div class="alert alert-danger text-center">
			                <strong> <a href="" class="alert-link">{{session('mensagemERRO')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
			            </div>
			        </div>
           		 @endif
		            <!-- Login input-->
		            <div class="form-group  input-control{{ $errors->has('email') ? ' has-error' : '' }}">
		                <div class="input-group">
		                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		                    <input id="user" name="email" type="text" value="{{old('email')}}"  placeholder="Digite seu email" class="form-control">
		                </div>
		                @if ($errors->has('email'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('email') }}</strong>
		                    </span>
		                @endif
		            </div>
					<!-- Senha input-->
					<div class="form-group input-control {{ $errors->has('senha') ? ' has-error' : '' }}">
		                <div class="input-group">
		                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		                    <input id="passwd" name="senha" type="password" placeholder="Digite sua senha" class="form-control">
		                </div>
		                @if ($errors->has('senha'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('senha') }}</strong>
		                    </span>
		                @endif
					</div>
		
					<!-- Button -->
					<div class="form-group col-md-12">
				    	<button type="submit" name="enviar" class="btn-acess btn btn-success">Entrar</button>
					</div>
				</form>
				<!-- Criar Conta -->
				<div class="row"><hr></div>
				<div class="row text-center">
					<label><a href="{{route('painel.cadastrar')}}">Criar uma conta</a></label>
		 		</div>
			</div>
		</div>
	</body>
</html>