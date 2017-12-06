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
    @if($_SESSION['usuario']->privilegio == 1)
    @endif
     <script>
        $(document).on("click", ".visu_aviso", function () {
            var myAvisoTitulo = $(this).data('titulo');
            var myAvisoMensagem = $(this).data('mensagem');
            $(".modal-body #titulo_aviso").html( myAvisoTitulo );
            $(".modal-body #mensagem_aviso").html( myAvisoMensagem );
        });
    </script>
        <div id="lista" class="col-xs-12 col-md-8">
            <!-- Lista Condôminos -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Lista de Avisos</h3>
                </div>
                <div class="panel-body">
                    @if($_SESSION['usuario']->privilegio == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn-add btn-acess btn btn-primary" data-toggle="modal" data-target="#modal-mensagem"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Novo Aviso</button>
                        </div>
                    </div>
                    @endif
                    <br>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Data</th>
                                <th>Criado Por</th>
                                <th>Ação</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avisos as $aviso)
                                <tr>
                                    <td>{{ $aviso->descricao }}</td>
                                    <td>{{ $aviso->created_at }}</td>
                                    <td>{{ $aviso->nome }}</td>
                                    <td>
                                            <a data-mensagem="{{ $aviso->mensagem }}" data-titulo="{{ $aviso->descricao }}" class="btn btn-default visu_aviso" data-toggle="modal" href="#modal-display"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        @if($_SESSION['usuario']->privilegio == 1)
                                            <a class="btn btn-primary" href="{{route('avisos.editar', $aviso->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        @endif
                                            <a class="btn btn-danger" href="{{route('avisos.destroy', $aviso->id)}}"><i class="fa fa-trash-o fa-lg"></i></a>&nbsp;
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
                        <h4 class="modal-title">Cadastar Avisos:</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{route('avisos.cadastro')}}" >
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-md-12 {{ $errors->has('descricao') ? ' has-error' : '' }}">
                                    <label for="tituloAviso">Título do Aviso:</label>
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
                                    <label id="msgAvisos" for="mensagem">Descrição do Aviso:</label>
                                    <textarea name="mensagem" value="{{ old('mensagem') }}"></textarea>
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
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-display">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header main-color-bg">
                        <button type="button" class="close" data-dismiss="modal"><span class="closeModal">×</span></button>
                        <h4 class="modal-title "> Visualizar Aviso</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <label>Título:</label>
                                <small name="titulo_aviso" id="titulo_aviso"></small>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">  
                                <label>Mensagem:</label>
                                <div class="displayMensagem">
                                    <p name="mensagem_aviso" id="mensagem_aviso"></p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="modal-footer">
                            <button type="submit" class="btn-acess btn btn-danger" data-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    @endsection
