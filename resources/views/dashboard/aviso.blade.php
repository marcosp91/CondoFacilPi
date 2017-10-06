@extends ('template.template')

    @section('painelMensagens')
        @if(session('mensagemSUCESSO'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemSUCESSO')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
        @if(session('mensagemERRO'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemERRO')}}</a></strong>.<a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
    @endsection

    @section('content')
        <div class="col-md-9"><!-- Coluna Painel Form -->
            <!-- Editar Perfil -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cadastrar Avisos</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{route('avisos.cadastro')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>Título Aviso</label>
                      <input type="text" class="form-control" name="descricao" placeholder="Título Aviso">
                    </div>
                    <div class="form-group">
                      <label for="mensagem">Campo Aviso</label>
                        <textarea name="mensagem" class="form-control" placeholder="Deixe seu aviso">
                        </textarea>
                    </div>
                    <div class="row">
                      <div class="text-center">
                        <button type="submit" class="btn-acess btn">Enviar</button>
                      </div>
                    </div>
                    
                    <input type="hidden" name="classe" value="App\Models\Painel\Aviso">
                  </form>
                </div><!-- Painel Body -->
            </div><!-- Painel Default -->
        </div><!-- Coluna Painel Form -->

    @endsection
