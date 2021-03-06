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
                    <h3 class="panel-title">Editar Aviso</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('avisos.update', $aviso->id)}}" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-xs-12 col-md-12 {{ $errors->has('descricao') ? ' has-error' : '' }}">
                                <label for="tituloAviso">Título do Aviso:</label>
                                <input id="tituloAviso" type="text" name="descricao" class="form-control" placeholder="Título do Aviso" @if(old('descricao')) value="{{old('descricao')}}" @elseif(!empty($aviso->descricao)) value="{{$aviso->descricao}}" @endif>
                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('descricao') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12{{ $errors->has('mensagem') ? ' has-error' : '' }}">
                                <label id="msgAvisos" for="mensagem">Descrição do Aviso:</label>
                                <textarea name="mensagem">
                                    @if(old('mensagem')) {{old('mensagem')}} @elseif(!empty($aviso->mensagem)) {{$aviso->mensagem}} @endif
                                </textarea>
                                @if ($errors->has('mensagem'))
                                    <span class="help-block">
                                          <strong>{{ $errors->first('mensagem') }}</strong>
                                      </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="classe" value="App\Models\Painel\Aviso">
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
