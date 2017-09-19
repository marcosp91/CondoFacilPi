<!DOCTYPE>
<html lang="pt-br">
	<head>
		<title>CondoFacil</title>
	 	 <meta charset="utf-8">
	  	<link rel="stylesheet" href="/css/bootstrap.min.css">
	  	<link rel="stylesheet" href="/css/formstyle.css">
	  	
	    
	</head>
	<body>
		<div class="container"">
			<div class="row painel-portal">
				<!-- Header Formulario -->
				<div class="panel-titulo">
					<h2>Portal do Condomínio</h2><p>Bem Vindo! Preencha os campos do formulário para acesso ao Portal</p>
				</div>
			</div>
			<form id="login-form" class="form-horizontal" action="{{route('login.autentica')}}" method="POST">
			{{ csrf_field() }}	
                            <!-- Login input-->
				<div class="input-group input-sm">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="user" name="email" type="text" placeholder="Digite seu email" class="form-control" >
				</div>
				<!-- Senha input-->
				<div class="input-group input-sm">
				  	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="passwd" name="senha" type="password" placeholder="Digite sua senha" class="form-control" >
				</div>
	
				<!-- Button -->
				<div class="input-group input-sm center-block">
			    	<button type="submit" name="enviar" class="btn btn-acess center-block">Entrar</button>
				</div>
			
				<!-- Criar Conta -->
				<div class="row linha"><hr></div>
				<div class="row text-center footer-form">
					<label><a id="alerta" href="{{route('painel.cadastrar')}}">Criar uma conta</a></label>
		 		</div>
			</form>
		</div>
	</body>
</html>