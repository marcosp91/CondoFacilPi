@extends ('template.template')
<?php if (!isset($_SESSION)) {session_start();}?>

    @section('painelMensagens')
        @if(session('mensagem'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagem')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
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
    @endsection

    @section('breadcrumb')
      {{  Breadcrumbs::render('cadastro/areaComum') }}
    @endsection

    @section('content')
    <div class="col-md-1"></div>
    <div class="col-xs-12 col-md-8">
        <!-- Lista Condôminos -->
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Áreas Comuns</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn-add btn-acess btn btn-primary"  data-toggle="modal" data-target="#modal-mensagem"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Nova Área Comum</button>
                    </div>
                </div>
                <br>
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Cobrança de Taxa</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                     <tbody>
                        @foreach ($areas as $area)
                            <tr>
                                <td>{{ $area->nome }}</td>
                                <td>{{ $area->descricao }}</td>
                                <td>True/False</td>
                                <td>
                                  <a class="btn btn-danger" href="{{route('areas.destroy', $area->id)}}"><i class="fa fa-trash-o fa-lg"></i></a>&nbsp;
                                <!--  <a class="btn btn-default" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- Painel Body Lista -->
        </div><!-- Painel Default Lista -->
    </div><!-- Coluna Lista -->
    @if(Session::has('errors'))
        <script>
            $(document).ready(function(){
                $('#modal-mensagem').modal({show: true});
            });
        </script>
    @endif
        <div class="modal fade" id="modal-mensagem">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header main-color-bg">
                        <button type="button" class="close" data-dismiss="modal"><span class="closeModal">×</span></button>
                        <h4 class="modal-title ">Cadastar Área Comum</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{route('area.cadastro')}}">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-md-12{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="nomeAreaComum" class="control-label">Nome da área:</label>
                                    <input type="text" id="nomeAreaComum" name="nome" class="form-control" value="{{ old('nome') }}" maxlength="50" placeholder="Ex: Salão de festa externo...">
                                    @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12{{ $errors->has('descricao') ? ' has-error' : '' }}">
                                    <label for="areaDescricao" class="control-label">Descrição do local:</label>
                                    <textarea id="areaDescricao" name="descricao" class="form-control" maxlength="300" rows="5" cols="10" value="{{ old('descricao') }}">
                                    </textarea>
                                    @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-xs-4 col-md-4">
                                    <label for="valorTaxa" class="control-label">Valor de Locação:</label>
                                    <input type="text" id="valorTaxa" name="valorTaxa" class="form-control" placeholder="Se houver, especifique um valor...">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="modal-footer">
                                    <button type="submit" class="btn-acess btn btn-success">Salvar</button>
                                    <button type="submit" class="btn-acess btn btn-danger" data-dismiss="modal">Cancelar</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      @endsection
