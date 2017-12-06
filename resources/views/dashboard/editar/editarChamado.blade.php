@extends ('template.template')
<?php if (!isset($_SESSION)) {session_start();}?>

    @section('painelMensagens')
        @if(session('mensagemERRO'))
            <div class="alert alert-danger text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemERRO')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
        @if(session('mensagemSUCESSO'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemSUCESSO')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
        @if(session('mensagemSucessoDELETE'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemSucessoDELETE')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
        @if(session('mensagemErroDELETE'))
            <div class="alert alert-danger text-center">
                <strong><a href="" class="alert-link">{{session('mensagemErroDELETE')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
    @endsection

    @section('breadcrumb')
      {{  Breadcrumbs::render('/avisos') }}
    @endsection

    @section('content')
    <div class="col-md-1"></div>
        <div id="lista" class="col-xs-12 col-md-8">
            <!-- Lista Condôminos -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Editar Chamado</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('chamados.editar', $chamado->id)}}" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-3 col-md-12 {{ $errors->has('descricao') ? ' has-error' : '' }}">
                                <label for="tituloChamado" class="control-label">Titulo Chamado:</label>
                                <input id="tituloChamado" type="text" name="assunto" class="form-control">
                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('descricao') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 col-md-4{{ $errors->has('mensagem') ? ' has-error' : '' }}">
                                <label for="tipo" class="control-label">Tipo:</label>
                                <select name="tipo" class="form-control">
                                    <option value="Manutenção">Manutenção</option>
                                    <option value="Reclamação">Reclamação</option>
                                    <option value="Dúvida">Dúvida</option>
                                    <option value="Sugestão">Sugestão</option>
                                    <option value="Elogios">Elogios</option>
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
                                <label id="msgAvisos" for="descricao">Descrição:</label>
                                <textarea name="descricao" class="noResize form-control" value="{{ old('mensagem') }}"></textarea>
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
                </div><!-- Painel Body Lista -->
            </div><!-- Painel Default Lista -->
        </div><!-- Coluna Lista -->

    @endsection
