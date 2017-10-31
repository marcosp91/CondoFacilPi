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
    <!-- @if($_SESSION['usuario']->privilegio == 1)   -->
        <div id="lista" class="col-xs-12 col-md-8">
            <!-- Lista Condôminos -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Lista de Avisos</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" placeholder="Filtrar avisos...">
                            <button type="button" class="btn-acess btn btn-warning"  style=" float:right;" data-toggle="modal" data-target="#modal-mensagem"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Novo Aviso</button>
                            <button type="button" class="btn-acess btn btn-success"  style=" float:left;" ><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
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
        <div class="modal fade" id="modal-mensagem">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header main-color-bg">
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        <h4 class="modal-title">Cadastar Avisos</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{route('avisos.cadastro')}}" >
                            {{ csrf_field() }}
                            <div class="row">
                              <div class="col-xs-12 col-md-12 {{ $errors->has('descricao') ? ' has-error' : '' }}">
                                <label for="tituloAviso">Título do Aviso</label>
                                <input id="tituloAviso" type="text" name="descricao" class="form-control" placeholder="Título do Aviso" value="{{ old('descricao') }}">
                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12{{ $errors->has('mensagem') ? ' has-error' : '' }}">
                                    <label id="msgAvisos" for="mensagem">Descrição do Aviso</label>
                                    <textarea name="mensagem" value="{{ old('mensagem') }}"></textarea>
                                    @if ($errors->has('mensagem'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('mensagem') }}</strong>
                                      </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="classe" value="App\Models\Painel\Aviso">
                        <button type="submit" class="btn-acess btn btn-success">Salvar</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-acess btn btn-warning" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- @endif -->
    @endsection
