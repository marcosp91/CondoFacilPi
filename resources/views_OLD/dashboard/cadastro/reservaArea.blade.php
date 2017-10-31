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
    @endsection

    @section('breadcrumb')
      {{  Breadcrumbs::render('cadastro/areaComum') }}
    @endsection

    @section('content')
    <div class="col-md-1"></div>
    <div class="col-xs-12 col-md-8"><!-- Coluna Painel Form -->
        <!-- Editar Perfil -->
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Reservar Área Comum</h3>
            </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        @foreach($areas->chunk(3) as $area)
                            <div class="row">
                               @foreach($area as $add)
                               <div class="col-xs-1 col-md-4">
                                    <div class="thumbnail">
                                        <h3>{{ $add->nome }}</h3>
                                        <img src="/img/testeLogo.png" alt="Area Comum" class="img-responsive" width="150" height="120">
                                        <div class="caption">
                                            <p>{{ $add->descricao }}</p>
                                            <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem" role="button">Reservar</a> <a href="#" class="btn btn-default" role="button">Editar</a></p>
                                        </div>
                                    </div>
                               </div>
                               @endforeach
                            </div>
                        @endforeach
                    </div>
                </div><!-- Painel Body -->
            </div><!-- Painel Default -->
    </div><!-- Coluna Painel Form -->
    <div class="modal fade" id="modal-mensagem">
             <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header main-color-bg">
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        <h4 class="modal-title ">Nova Reserva</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="#">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <p>Descrição:</p>
                                <a href="#" class="thumbnail">
                                    <img src="/img/testeLogo.png" alt="Area Comum" width="120" height="160">
                                </a>
                                <label>Data de Reserva</label>
                                <input type="text" id="datepicker" name="dataReserva" class="form-control" >
                                 <label>Observação</label>
                                <input type="text" name="observação" class="form-control" >
                            </div>
                        </div>
                        <button type="submit" class="btn-acess btn btn-success">Salvar</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn-acess btn btn-warning" data-dismiss="modal">Fechar</button>
                   </div>
               </div>
            </div>
        </div>ta
      @endsection
