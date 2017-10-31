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
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" type="text" placeholder="Filtrar Áreas Comuns...">
                    </div>
                  </div>
                  <br>
                  <!-- Container (Pricing Section) -->
                  <div id="pricing" class="container-fluid">
                    <div class="row slideanim">
                      <div class="col-sm-4 col-xs-12">
                        <div class="panel panel-default text-center">
                          <div class="panel-heading">
                            <h4>Área Comum</h4>
                          </div>
                          <div class="panel-body">
                            <img src="/img/testeLogo.png" alt="Area Comum" class="img-thumbnail" width="204" height="136"> 
                          </div>
                          <div class="panel-footer">
                            <button class="btn btn-info">Visualizar</button>
                          </div>
                        </div>      
                      </div>     
                      <div class="col-sm-4 col-xs-12">
                        <div class="panel panel-default text-center">
                          <div class="panel-heading">
                            <h4>Área Comum 02</h4>
                          </div>
                          <div class="panel-body">
                            <img src="/img/testeLogo.png" alt="Area Comum" class="img-thumbnail" width="204" height="136"> 
                          </div>
                          <div class="panel-footer">
                            <button class="btn btn-info">Visualizar</button>
                          </div>
                        </div>      
                      </div>       
                      <div class="col-sm-4 col-xs-12">
                        <div class="panel panel-default text-center">
                          <div class="panel-heading">
                            <h4>Área Comum 03</h4>
                          </div>
                          <div class="panel-body">
                            <img src="/img/testeLogo.png" alt="Area Comum" class="img-thumbnail" width="204" height="136"> 
                          </div>
                          <div class="panel-footer">
                            <button class="btn btn-info">Visualizar</button>
                          </div>
                        </div>      
                      </div>    
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn-acess btn btn-success">Salvar</button>
                    </div>
                  </div>
                </div>
              </div><!-- Painel Body -->
          </div><!-- Painel Default -->
      </div><!-- Coluna Painel Form -->
     
      @endsection
