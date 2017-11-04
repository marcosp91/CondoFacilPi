@extends ('template.template')
<?php if (!isset($_SESSION)) {session_start();}?>

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
                <strong><a href="" class="alert-link">{{session('mensagemErroDELETE')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
    @endsection

    @section('breadcrumb')
      {{  Breadcrumbs::render('/chamados') }}
    @endsection

    @section('content')
    <div class="col-md-1"></div>
    @if($_SESSION['usuario']->privilegio == 1)
    @endif
        <div id="lista" class="col-xs-12 col-md-8">
            <!-- Lista Condôminos -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Lista de Chamados</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="add btn-acess btn btn-warning" data-toggle="modal" data-target="#modal-mensagem"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Novo Chamado</button>
                        </div>
                    </div>
                    <br>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Detalhes</th>
                                <th>Nº Protocolo</th>
                                <th>Assunto</th>
                                <th>Aberto Por</th>
                                <th>Status</th>
                                <th>Tipo</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($chamados as $chamado)
                            <tr>
                                <td class="name">{{ $chamado->assunto }}</td>
                                <td class="name">{{ $chamado->descricao }}</td>
                                <td></td>
                                <td>
                                    <!--<a class="btn btn-danger" href="#"><i class="fa fa-trash-o fa-lg"></i></a>&nbsp;
                                    <a class="btn btn-default" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>-->
                                </td>
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
                        <button type="button" class="close" data-dismiss="modal"><span class="closeModal">×</span></button>
                        <h4 class="modal-title">Novo Chamado:</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{route('chamados.cadastro')}}" >
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-3 col-md-12 {{ $errors->has('descricao') ? ' has-error' : '' }}">
                                    <label for="tituloAviso" class="control-label">Assunto do Aviso:</label>
                                    <input id="tituloAviso" type="text" name="assunto" class="form-control">
                                    @if ($errors->has('descricao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('descricao') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 col-md-4{{ $errors->has('mensagem') ? ' has-error' : '' }}">
                                    <label for="tipoAviso" class="control-label">Tipo:</label>
                                    <select name="tipoAviso" class="form-control">
                                        <option value="manutencao">Manutenção</option>
                                        <option value="reclamacao">Reclamação</option>
                                        <option value="duvida">Dúvida</option>
                                        <option value="sugestao">Sugestão</option>
                                        <option value="elogios">Elogios</option>
                                    </select>
                                    @if ($errors->has('mensagem'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('mensagem') }}</strong>
                                      </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12{{ $errors->has('mensagem') ? ' has-error' : '' }}">
                                    <label id="msgAvisos" for="mensagem">Descrição:</label>
                                    <textarea name="mensagem" value="{{ old('mensagem') }}"></textarea>
                                    @if ($errors->has('mensagem'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('mensagem') }}</strong>
                                      </span>
                                    @endif
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
