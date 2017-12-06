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
                    <h3 class="panel-title">Editar Área</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('areas.update', $area->id)}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-xs-12 col-md-12{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nomeAreaComum" class="control-label">Nome da área:</label>
                                <input type="text" id="nomeAreaComum" name="nome" class="form-control" @if(old('nome')) value="{{old('nome')}}" @elseif(!empty($area->nome)) value="{{$area->nome}}" @endif maxlength="50" placeholder="Ex: Salão de festa externo...">
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
                                <textarea id="areaDescricao" name="descricao" class="form-control" maxlength="300" rows="5" cols="10">@if(old('descricao')) {{old('descricao')}} @elseif(!empty($area->descricao)) {{$area->descricao}} @endif
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
                                <input type="text" id="valorTaxa" name="valor_locacao" class="form-control" placeholder="Se houver, especifique um valor..." @if(old('valor_locacao')) value="{{old('valor_locacao')}}" @elseif(!empty($area->valor_locacao)) value="{{$area->valor_locacao}}" @endif>
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
