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
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel pandel-default">
						<div class="text-center">
							<strong>BEM VINDO! </strong>
							<h4>Condo Fácil - Acesso ao Portal</h4>
							<p>Informe seu usuário e senha.</p>
							<hr>
						</div>
						<div class="panel-body">
							<form id="login-form"  action="{{route('login.autentica')}}" method="POST">
								{{ csrf_field() }}
								@if(session('mensagemSUCESSO'))
	                            <div class="alert alert-success text-center">
	                                <strong> <a href="" class="alert-link">{{session('mensagemSUCESSO')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
	                            </div>
	                       		@endif
		                        @if(session('mensagemERRO'))
	                            <div class="alert alert-danger text-center">
	                                <strong> <a href="" class="alert-link">{{session('mensagemERRO')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
	                            </div>
		                        @endif
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="user" name="email" type="text" value="{{old('email')}}"  placeholder="Informe seu e-mail" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="passwd" name="senha" type="password" placeholder="Digite sua senha" class="form-control"/>
									</div>
								</div>
								<div class="form-group text-center">
									<input type="submit" name="enviar" class="btn-acess btn btn-success" value="Entrar">
								</div>
							</form><!-- form -->
							<div class="text-center">
								<a href="{{ route('painel.cadastrar') }}">...criar uma conta</a>
					 		</div>
						</div><!-- panel-body -->
					</div><!-- panel-default -->
				</div><!-- col-md -->
			</div><!-- row -->
		</div><!-- container -->

  	<script src="/js/bootstrap.min.js"></script>
 	<script src="/js/jquery-3.2.1.min.js"></script>
	</body>
</html>