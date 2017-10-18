<?php if (!isset($_SESSION)) {
    session_start();
} ?>
@extends ('template.template')

    @section('painelMensagens')
        @if(session('mensagemERRO'))
            <div class="alert alert-danger text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemERRO')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
        @if(session('mensagemSUCESSO'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemSUCESSO')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
        @if(session('mensagemSucessoDELETE'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemSucessoDELETE')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
        @if(session('mensagemErroDELETE'))
            <div class="alert alert-danger text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemErroDELETE')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
    @endsection

    @section('breadcrumb')
      {{  Breadcrumbs::render('/avisos') }}
    @endsection

    @section('content')
    <div class="col-md-1"></div>
    @if($_SESSION['usuario']->privilegio == 1)  
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
                        <input id="tituloAviso" type="text" name="descricao" class="form-control" placeholder="Título do Aviso" value="{{ old('descricao') }}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        <label id="msgAvisos" for="mensagem">Descrição do Aviso</label>
                          <textarea name="mensagem" value="{{ old('mensagem') }}"></textarea>
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
        @endif
        <div class="dash col-md-4">
        </div>
        <div id="lista" class="col-xs-12 col-md-8 @if($_SESSION['usuario']->privilegio == 1) ? collapse :  @endif">
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
                                @if($_SESSION['usuario']->privilegio == 1)
                                    <th>Ação</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
							@foreach ($avisos as $aviso)
								<tr>
									<td>{{ $aviso->descricao }}</td>
									<td>{{ $aviso->created_at }}</td>
									<td>{{ $aviso->nome }}</td>
									@if($_SESSION['usuario']->privilegio == 1)
                                                                            <td><a class="btn btn-danger" href="{{route('avisos.destroy', $aviso->id)}}"><i class="fa fa-trash-o fa-lg"></i>&nbsp; Deletar</a></</td>
                                                                        @endif
                                                                </tr>
							@endforeach
                        </tbody>
                    </table>
                </div><!-- Painel Body Lista -->
            </div><!-- Painel Default Lista -->
        </div><!-- Coluna Lista -->
    @endsection
