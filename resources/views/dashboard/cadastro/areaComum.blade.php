@extends ('template.template')
<?php if (!isset($_SESSION)) {session_start();}?>

    @section('painelMensagens')
        @if(session('mensagem'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagem')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
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

    

    @section('content')
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-md-8"><!-- Coluna Painel Form -->
          <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cadastrar Área Comum</h3>
              </div>
              <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="{{route('area.cadastro')}}">
                      {{ csrf_field() }}
                      <div class="row">
                          <div class="col-xs-12 col-md-12{{ $errors->has('nome') ? ' has-error' : '' }}">
                              <label for="nomeAreaComum" class="control-label">Nome</label>
                              <input type="text" id="nomeAreaComum" name="nome" class="form-control" value="{{ old('nome') }}">
                              @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12 col-md-12{{ $errors->has('bloco') ? ' has-error' : '' }}">
                              <label for="areaDescricao" class="control-label">Descrição</label>
                              <textarea id="areaDescricao" name="descricao" class="form-control" maxlength="300" rows="5" cols="10" value="{{ old('descricao') }}">
                              </textarea>
                              @if ($errors->has('bloco'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('bloco') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="text-center">
                        <button type="submit" class="btn-acess btn btn-success">Salvar</button>
                        <button type="button" class="btn-acess btn btn-info" data-toggle="collapse" data-target="#lista">Exibir Área Comum</button>
                      </div>
                    </div>
                  </div>
                  </form>
              </div><!-- Painel Body -->
          </div><!-- Painel Default -->
      <div class="dash col-md-4">
      </div>
      <div id="lista" class="col-xs-12 col-md-8 collapse">
          <!-- Lista Condôminos -->
          <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Lista de Área Comun</h3>
              </div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filtrar áreas comuns...">
                      </div>
                  </div>
                  <br>
                  <table class="table table-hover table-responsive">
                      <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                          </tr>
                      </thead>
                      <tbody>
                            @foreach ($areas as $area)
                                    <tr>
                                            <td>{{ $area->nome }}</td>
                                            <td>{{ $area->descricao }}</td>
                                            <td><a class="btn btn-danger" href="{{route('areas.destroy', $area->id)}}"><i class="fa fa-trash-o fa-lg"></i>&nbsp; Deletar</a></</td>
                                    </tr>
                            @endforeach
                      </tbody>
                  </table>
              </div><!-- Painel Body Lista -->
          </div><!-- Painel Default Lista -->
      </div><!-- Coluna Lista -->
      @endsection
