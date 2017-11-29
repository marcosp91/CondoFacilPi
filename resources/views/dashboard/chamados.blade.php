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
      {{  Breadcrumbs::render('/chamados') }}
    @endsection

    @section('content')
    <div class="col-md-1"></div>
    @if($_SESSION['usuario']->privilegio == 1)
    @endif
    <script>
        $(document).on("click", ".visu_chamado", function () {
            var mychamadoProt = $(this).data('protocolo');
            var mychamadoAssunto = $(this).data('assunto');
            var mychamadoTipo = $(this).data('tipo');
            var mychamadoData = $(this).data('data');
            var mychamadoMensagem = $(this).data('mensagem');
            $(".modal-body #prot_chamado").html( mychamadoProt );
            $(".modal-body #assunto_chamado").html( mychamadoAssunto );
            $(".modal-body #tipo_chamado").html( mychamadoTipo );
            $(".modal-body #data_chamado").html( mychamadoData );
            $(".modal-body #mensagem_chamado").html( mychamadoMensagem );
        });
    </script>
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
                                <th>Assunto</th>
                                <th>Nº Protocolo</th>
                                <th>Detalhes</th>
                                <th>Aberto Por</th>
                                <!-- <th>Status</th> -->
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($chamados as $chamado)
                            <tr>
                                <td class="name">{{ $chamado->assunto }}</td>
                                <td class="name">{{ $chamado->id }}</td>
                                <td class="name">{{ $chamado->descricao }}</td>
                                <td class="name">{{ $chamado->nome }}</td>
                                <td class="name">
                                    <a class="btn btn-danger" href="#"><i class="fa fa-trash-o fa-lg"></i></a>&nbsp;
                                    <a data-protocolo="{{ $chamado->id }}"
                                       data-assunto="{{ $chamado->assunto }}"
                                       data-tipo="{{ $chamado->tipo }}"
                                       data-data="{{ $chamado->created_at }}"
                                       data-mensagem="{{ $chamado->descricao }}"
                                       class="btn btn-default visu_chamado" data-toggle="modal" href="#modal-display"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
                                    <textarea name="mensagem" class="noResize form-control" value="{{ old('mensagem') }}"></textarea>
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

        <div class="modal fade" id="modal-display">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header main-color-bg">
                        <button type="button" class="close" data-dismiss="modal"><span class="closeModal">×</span></button>
                        <h4 class="modal-title "> Visualizar Chamados</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <label>Nº Protocolo:</label>
                                <p id="prot_chamado"></p>
                            </div>
                             <div class="col-xs-12 col-md-6">
                                <label>Assunto:</label>
                                <p id="assunto_chamado"></p>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <label>Tipo:</label>
                                <p id="tipo_chamado"></p>
                            </div>
                            <!--<div class="col-xs-12 col-md-4">
                                <label>Status:</label>
                                <select name="status" class="form-control">
                                    <option value="Cancelar">Cancelar</option>
                                    <option value="Pendente">Pendente</option>
                                    <option value="Resolvido">Resolvido</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>-->
                            <div class="col-xs-12 col-md-4">
                                <label>Data Abertura:</label>
                                <p id="data_chamado"></p>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-xs-12 col-md-12">  
                                <label>Mensagem:</label>
                                <p id="mensagem_chamado"></p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="modal-footer">
                            <!--<button type="submit" class="btn-acess btn btn-success">Responder Chamado</button>-->
                            <button type="submit" class="btn-acess btn btn-danger" data-dismiss="modal">Fechar</button>
                          </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    @endsection
