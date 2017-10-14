@extends ('template.template')

    @section('painelMensagens')
        @if(session('mensagem'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagem')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
    @endsection
    @section('content')
    <div class="col-md-1"></div>
          <div class="col-xs-12 col-md-8"><!-- Coluna Painel Form -->
            <!-- Editar Perfil -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cadastrar Avisos</h3>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="{{route('avisos.cadastro')}}" >
				  {{ csrf_field() }}
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        <label for="tituloAviso">Título do Aviso</label>
                        <input id="tituloAviso" type="text" name="descricao" class="form-control" placeholder="Título do Aviso">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        <label id="msgAviso" for="mensagem">Descrição do Aviso</label>
                          <textarea name="mensagem"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div class="text-center">
                          <button type="submit" class="btn-acess btn btn-success">Salvar</button>
                          <button type="button" class="btn-acess btn btn-info" data-toggle="collapse" data-target="#lista">Exibir Avisos</button>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="classe" value="App\Models\Painel\Aviso">
                  </form>
                </div><!-- Painel Body -->
            </div><!-- Painel Default -->
        </div><!-- Coluna Painel Form -->
        <div class="dash col-md-4">
        </div>
        <div id="lista" class="col-xs-12 col-md-8 collapse">
            <!-- Lista Condôminos -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Lista de Avisos</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" placeholder="Filtrar avisos...">
                        </div>
                    </div>
                    <br>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Data</th>
                                <th>Criado Por</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach ($avisos as $aviso)
								<tr>
									<td>{{ $aviso->descricao }}</td>
									<td>{{ $aviso->created_at }}</td>
									<td>{{ $aviso->nome }}</td>
									 <td><a class="btn btn-default" href="#">Editar</a> <a class="btn btn-danger" href="#"><i class="fa fa-trash-o fa-lg"></i>&nbsp; Deletar</a></</td>
								</tr>
							@endforeach
                        </tbody>
                    </table>
                </div><!-- Painel Body Lista -->
            </div><!-- Painel Default Lista -->
        </div><!-- Coluna Lista -->
    @endsection
