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

    @section('content')
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-md-8"><!-- Coluna Painel Form -->
          <!-- Editar Perfil -->
          <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cadastrar Condômino</h3>
              </div>
              <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="{{route('painel.store')}}">
                      {{ csrf_field() }}
                      <div class="row">
                          <div class="col-xs-6 col-md-6{{ $errors->has('nome') ? ' has-error' : '' }}">
                              <label for="nomeUsuario" class="control-label">Nome Completo:</label>
                              <input type="text" id="nomeUsuario" name="nome" class="form-control" placeholder="Nome Completo" value="">
                              @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-xs-6 col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="emailUsuario" class="control-label">Email:</label>
                              <input type="text" id="emailUsuario" name="email" class="form-control" placeholder="Email" value="">
                              @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-6 col-md-6{{ $errors->has('cpf') ? ' has-error' : '' }}">
                              <label for="cpfUsuario" class="control-label">CPF:</label>
                              <input type="text" id="cpfUsuario" name="cpf" class="form-control" placeholder="CPF" value="">
                              @if ($errors->has('cpf'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('cpf') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-xs-6 col-md-6{{ $errors->has('telefone') ? ' has-error' : '' }}">
                              <label for="tel" class="control-label">Telefone:</label>
                              <input type="text" id="telUsuario" name="telefone" class="form-control" placeholder="Telefone" value="">
                              @if ($errors->has('telefone'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('telefone') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-6 col-md-3{{ $errors->has('complemento') ? ' has-error' : '' }}">
                              <label for="complemento" class="control-label">Complemento:</label>
                              <select name="complemento" class="form-control">
                                  <option value=""  selected="selected" disabled>Escolha</option>
                                  <option value="Avenida">Avenida</option>
                                  <option value="Condomínio">Condomínio</option>
                                  <option value="Conjunto">Conjunto</option>
                                  <option value="Conjunto">Conjunto</option>
                                  <option value="Estrada">Estrada</option>
                                  <option value="Loteamento">Loteamento</option>
                                  <option value="Praça">Praça</option>
                                  <option value="Quadra">Quadra</option>
                                  <option value="Residencial">Residencial</option>
                                  <option value="Rodovia">Rodovia</option>
                                  <option value="Rua">Rua</option>
                                  <option value="Servidao">Servidão</option>
                                  <option value="Travessa">Travessa</option>
                              </select>
                              @if ($errors->has('complemento'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('complemento') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-xs-6 col-md-5{{ $errors->has('endereco') ? ' has-error' : '' }}">
                              <label for="endUsuario" class="control-label">Endereço:</label>
                              <input type="text" id="endUsuario" name="endereco" class="form-control" placeholder="Endereço" value=""/>
                              @if ($errors->has('endereco'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('endereco') }}</strong>
                              </span>
                              @endif
                          </div>
                           <div class="col-xs-6 col-md-2{{ $errors->has('bloco') ? ' has-error' : '' }}">
                              <label for="blocoUsuario" class="control-label">Bloco:</label>
                              <input type="text" id="blocoUsuario" name="bloco" class="form-control" placeholder="Bloco" value=""/>
                              @if ($errors->has('bloco'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('bloco') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-xs-6 col-md-2{{ $errors->has('num_residencia') ? ' has-error' : '' }}">
                              <label for="numUsuario" class="control-label">Num:</label>
                              <input type="text" id="numUsuario" name="num_residencia" class="form-control" placeholder="Numero" value="">
                              @if ($errors->has('num_residencia'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('num_residencia') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-xs-6 col-md-4{{ $errors->has('cidade') ? ' has-error' : '' }}">
                              <label for="cidadeUsuario" class="control-label">Cidade:</label>
                              <input type="text" id="telUsuario" name="cidade" class="form-control" placeholder="Cidade" value="">
                              @if ($errors->has('cidade'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('cidade') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-xs-6 col-md-4{{ $errors->has('estado') ? ' has-error' : '' }}">
                              <label for="estado" class="control-label">UF:</label>
                              <select name="estado" class="form-control">
                                  <option value="" selected="selectd" disabled>Escolha</option>
                                  <option value="AC">Acre</option>
                                  <option value="AL">Alagoas</option>
                                  <option value="AP">Amapá</option>
                                  <option value="AM">Amazonas</option>
                                  <option value="BA">Bahia</option>
                                  <option value="CE">Ceará</option>
                                  <option value="DF">Distrito Federal</option>
                                  <option value="ES">Espírito Santo</option>
                                  <option value="GO">Goiás</option>
                                  <option value="MA">Maranhão</option>
                                  <option value="MT">Mato Grosso</option>
                                  <option value="MS">Mato Grosso do Sul</option>
                                  <option value="MG">Minas Gerais</option>
                                  <option value="PA">Pará</option>
                                  <option value="PB">Paraíba</option>
                                  <option value="PR">Paraná</option>
                                  <option value="PE">Pernambuco</option>
                                  <option value="PI">Piauí</option>
                                  <option value="RJ">Rio de Janeiro</option>
                                  <option value="RN">Rio Grande do Norte</option>
                                  <option value="RS">Rio Grande do Sul</option>
                                  <option value="RO">Rondônia</option>
                                  <option value="RR">Roraima</option>
                                  <option value="SC">Santa Catarina</option>
                                  <option value="SP">São Paulo</option>
                                  <option value="SE">Sergipe</option>
                                  <option value="TO">Tocantins</option>
                              </select>
                              @if ($errors->has('estado'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('estado') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-xs-6 col-md-4{{ $errors->has('cep') ? ' has-error' : '' }}">
                              <label for="cep" class="control-label">CEP:</label>
                              <input type="text" id="cepUsuario" name="cep" class="form-control" placeholder="CEP" value="">
                              @if ($errors->has('cep'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('cep') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="text-center">
                            <button type="submit" class="btn-acess btn btn-success">Salvar</button>
                            <button type="button" class="btn-acess btn btn-info" data-toggle="collapse" data-target="#lista">Exibir Condôminos</button>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="id" value="{{$_SESSION['usuario']->id}}">
                      <input type="hidden" name="classe" value="Condomino">
                  </form>
              </div><!-- Painel Body -->
          </div><!-- Painel Default -->
      </div><!-- Coluna Painel Form -->
      <div class="dash col-md-4">
      </div>
      <div id="lista" class="col-xs-12 col-md-8 collapse">
          <!-- Lista Condôminos -->
          <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Lista de Condôminos</h3>
              </div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filtrar condôminos...">
                      </div>
                  </div>
                  <br>
                  <table class="table table-hover table-responsive">
                      <thead>
                          <tr>
                              <th>Nome</th>
                              <th>Email</th>
                              <th>CPF</th>
                              <th>Ação</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                    <td>{{ $usuario->nome }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->cpf }}</td>
                                    <td><a class="btn btn-default" href="#">Editar</a> <a class="btn btn-danger" href="#"><i class="fa fa-trash-o fa-lg"></i>&nbsp; Deletar</a></</td>
                            </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div><!-- Painel Body Lista -->
          </div><!-- Painel Default Lista -->
      </div><!-- Coluna Lista -->
      @endsection
