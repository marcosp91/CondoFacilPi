@extends ('template.template')
<?php if (!isset($_SESSION)) {session_start();}?>

    @section('painelMensagens')
        @if(session('mensagem'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagem')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
        @if(session('mensagemCONDOMINIO'))
            <div class="alert alert-success text-center">
                <strong> <a href="" class="alert-link">{{session('mensagemCONDOMINIO')}}</a></strong><a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        @endif
    @endsection

    @section('breadcrumb')
      {{  Breadcrumbs::render('cadastro/condominio') }}
    @endsection

    @section('content')
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-8">
            <!-- Editar Perfil -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    @if($_SESSION['usuario']->privilegio == 1 && $_SESSION['usuario']->condominio_id > 0)
                        <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Condomínio</h3>
                    @elseif($_SESSION['usuario']->privilegio == 1)
                        <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cadastrar Condomínio</h3>
                    @endif                  
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('condominio.atualizar')}}" >
                        {{ csrf_field() }}
                        @if($_SESSION['usuario']->condominio_id > 0)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-xs-6 col-md-6{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nome" class="control-label">Nome:</label>
                                <input type="text" id="nomeUsuario" name="nome" class="form-control" placeholder="Nome do Condominio" @if(old('nome')) value="{{old('nome')}}" @elseif(!empty($condominio->nome)) value="{{$condominio->nome}}" @endif >
                                @if ($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-xs-6 col-md-6{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                                <label for="cnpjUsuario" class="control-label">CNPJ:</label>
                                <input type="text" id="cnpjUsuario" name="cnpj" class="form-control" placeholder="CNPJ" @if(old('cnpj')) value="{{old('cnpj')}}" @elseif(!empty($condominio->cnpj)) value="{{$condominio->cnpj}}" @endif >
                                @if ($errors->has('cnpj'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cnpj') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4{{ $errors->has('telefone') ? ' has-error' : '' }}">
                                <label for="telefone" class="control-label">Telefone:</label>
                                <input type="text" id="telUsuario" name="telefone" class="form-control" placeholder="Telefone" @if(old('telefone')) value="{{old('telefone')}}" @elseif(!empty($condominio->telefone)) value="{{$condominio->telefone}}" @endif >
                                @if ($errors->has('telefone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-xs-4 col-md-4{{ $errors->has('cep') ? ' has-error' : '' }}">
                                <label for="cep" class="control-label">CEP:</label>
                                <input type="text" id="cepUsuario" name="cep" class="form-control" placeholder="CEP" @if(old('cep')) value="{{old('cep')}}" @elseif(!empty($condominio->cep)) value="{{$condominio->cep}}" @endif >
                                @if ($errors->has('cep'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cep') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-xs-4 col-md-4{{ $errors->has('complemento') ? ' has-error' : '' }}">
                                <label for="complemento" class="control-label">Complemento:</label>
                                <select name="complemento" class="form-control">
                                    <option value="" disabled selected="selected">Selecione</option>
                                    <option value="Predial">Predial</option>
                                    <option value="Residencial">Residencial</option>
                                </select>
                                @if ($errors->has('complemento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('complemento') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-xs-6 col-md-6{{ $errors->has('endereco') ? ' has-error' : '' }}">
                                <label for="endereco" class="control-label">Endereço:</label>
                                <input type="text" id="numUsuario" name="endereco" class="form-control" placeholder="Endereço" @if(old('endereco')) value="{{old('endereco')}}" @elseif(!empty($condominio->endereco)) value="{{$condominio->endereco}}" @endif >
                                @if ($errors->has('endereco'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('endereco') }}</strong>
                                </span>
                                @endif
                            </div>
                              <div class="col-xs-6 col-md-6{{ $errors->has('cidade') ? ' has-error' : '' }}">
                                <label for="cidade" class="control-label">Cidade:</label>
                                <input type="text" id="telUsuario" name="cidade" class="form-control" placeholder="Cidade" @if(old('cidade')) value="{{old('cidade')}}" @elseif(!empty($condominio->cidade)) value="{{$condominio->cidade}}" @endif >
                                @if ($errors->has('cidade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cidade') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                <label for="tipo" class="control-label">Tipo:</label>
                                <select name="tipo" class="form-control">
                                    <option value="" disabled selected="selected">Tipo</option>
                                    <option value="Avenida">Avenida</option>
                                    <option value="Conjunto">Conjunto</option>
                                    <option value="Estrada">Estrada</option>
                                    <option value="Loteamento">Loteamento</option>
                                    <option value="Praça">Praça</option>
                                    <option value="Quadra">Quadra</option>
                                    <option value="Rodovia">Rodovia</option>
                                    <option value="Rua">Rua</option>
                                    <option value="Servidao">Servidão</option>
                                    <option value="Travessa">Travessa</option>
                                </select>   
                                @if ($errors->has('tipo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-xs-4 col-md-4{{ $errors->has('numero') ? ' has-error' : '' }}">
                                <label for="numero" class="control-label">Número:</label>
                                <input type="text" id="numUsuario" name="numero" class="form-control" placeholder="Número" @if(old('numero')) value="{{old('numero')}}" @elseif(!empty($condominio->numero)) value="{{$condominio->numero}}" @endif >
                                @if ($errors->has('numero'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('numero') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-xs-4 col-md-4{{ $errors->has('estado') ? ' has-error' : '' }}">
                                <label for="estado" class="control-label">UF:</label>
                                <select name="estado" class="form-control">
                                    <option value="" selected="selectd" disabled>UF</option>
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
                        </div> <!-- Row Cidade -->
                        <div class="form-group">
                            <div class="row text-center">
                                <button type="submit" class="btn-acess btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div><!-- Painel Body -->
            </div><!-- Painel Default -->
        </div><!-- Coluna Painel Form -->
    @endsection
