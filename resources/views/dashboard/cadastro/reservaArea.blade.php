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
        @if(session('mensagemERRO'))
            <div class="alert alert-danger text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemERRO')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
    @endsection

    @section('breadcrumb')
      {{  Breadcrumbs::render('cadastro/reservaArea') }}
    @endsection

    @section('content')
    <script>
        $(document).on("click", ".id-area", function () {
            var myAreaId = $(this).data('id');
            $(".modal-body #id_area").val( myAreaId );
        });
    </script>
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
                               @foreach($area as $add)
                               <div class="col-md-4">
                                    <div class="colImage thumbnail">
                                        <h3>{{ $add->nome }}</h3>
                                        <img src="/img/testeLogo.png" class="img-reponsive">
                                        <div class="caption">
                                            <p class="text-muted">{{ $add->descricao }}</p>
                                            <a data-id="{{ $add->id }}"  class="btn-acess btn btn-info id-area" data-toggle="modal" data-target="#modal-mensagem" role="button">Reservar</a>
                                        </div>
                                    </div>
                               </div>
                               @endforeach
                        @endforeach
                    </div>
                </div><!-- Painel Body -->
            </div><!-- Painel Default -->
    </div><!-- Coluna Painel Form -->
    <div class="modal fade" id="modal-mensagem">
             <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header main-color-bg">
                        <button type="button" class="close" data-dismiss="modal"><span class="closeModal">×</span></button>
                        <h4 class="modal-title ">Nova Reserva</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="#">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <label>Motivo da Reserva:</label>
                                    <input type="text" name="motivo" placeholder="Informe o motivo da reserva" maxlength="50" class="form-control" value="{{ old('motivo') }}">
                                </div> 
                                <div class="col-xs-12 col-md-4">  
                                    <label>Data de Reserva:</label>
                                    <input type="text" id="datepicker" name="data" class="form-control" value="{{ old('data') }}">
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <label>Observação:</label>
                                    <input type="text" name="observacao" value="{{ old('observacao') }}" placeholder="Se desejar, informe observações da reserva" maxlength="50" class="form-control">
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="id_area" id="id_area" value="">
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
