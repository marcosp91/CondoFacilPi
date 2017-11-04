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
							<p>Cadastre-se para obter acesso ao Portal.</p>
							<hr>
						</div>
						<div class="panel-body">
							<form action="{{ route('painel.store') }}" method="POST">
	                            {{ csrf_field() }}
								<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
		                        	<input id="inputUser" name="nome" class="form-control " value="{{old('nome')}}" placeholder="Digite seu Nome" type="text">
					                @if ($errors->has('nome'))
					                    <span class="help-block">
					                        <strong>{{ $errors->first('nome') }}</strong>
					                    </span>
					                @endif
								</div>
								<!-- Email input -->	  
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							    	<input id="inputEmail" name="email" class="form-control" value="{{old('email')}}"  placeholder="E-mail: nome@exemplo.com" type="email">
			                        @if ($errors->has('email'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('email') }}</strong>
			                            </span>
			                        @endif
				                </div>

								<!-- Senha [Double] -->
								<div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
									<input type="password" name="senha" class="form-control" value="{{old('senha')}}"  placeholder="Digite sua senha">
			                        @if ($errors->has('senha'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('senha') }}</strong>
			                            </span>
			                        @endif
			                    </div>
								<div class="form-group {{ $errors->has('senha-confirm') ? ' has-error' : '' }}">
									<input type="password" name="senha-confirm" class="form-control" value="{{old('senha-confirm')}}"  placeholder="Confirme a senha"/>
			                        @if ($errors->has('senha-confirm'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('senha-confirm') }}</strong>
			                            </span>
			                        @endif
			               		</div>
												
								<!-- Button (Cadastro) -->
								<div class="form-group text-center">
							    	<button type="submit" name="enviar" class="btn-acess btn btn-success">Cadastrar</button>
								</div>
			                    <input type="hidden" name="classe" value="Sindico">
							</form><!-- form -->
							<div class="text-center">
								<a href="{{ route('login.index') }}">...voltar ao login</a>
					 		</div>
						</div><!-- panel-body -->
					</div><!-- panel-default -->
				</div><!-- col-md -->
			</div><!-- row -->
		</div><!-- container -->


  	<script src="/js/bootstrap.min.js"></script>
	</body>
</html>