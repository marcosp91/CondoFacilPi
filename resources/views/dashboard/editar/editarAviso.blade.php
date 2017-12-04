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
                    <h3 class="panel-title">Editar Avisos</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($aviso, ['method' => 'PATCH', 'action' => ['AvisoController@update', $aviso->id]]) !!}
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <label for="tituloAviso">Título do Aviso:</label>
                                {!! Form::text('descricao', null, array('placeholder' => 'Titulo','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <label id="msgAvisos" for="mensagem">Descrição do Aviso:</label>
                                {!! Form::textarea('mensagem', null, array('placeholder' => 'Mensagem','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="id" value="{{ $aviso->id }}">
                        <div class="row">
                            <div class="form-group text-center">
                                <button name="submit" class="btn-acess btn btn-success">Enviar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div><!-- Painel Body Lista -->
            </div><!-- Painel Default Lista -->
        </div><!-- Coluna Lista -->

    @endsection
