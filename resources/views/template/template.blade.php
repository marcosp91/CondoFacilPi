<?php if (!isset($_SESSION)) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Condo Fácil - Portal</title>
        
        <!-- Bootstrap & CSS Bibliotecas -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="/js/jquery-ui-1.11.4/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
       
        
        <!-- JQuery Bibliotecas -->
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/jquery.maskedinput.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script src="/js/jquery.maskMoney.js" type="text/javascript"></script>

        <!-- Bootstrap Core & JavaScript & JQUery -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="/js/ckeditor/ckeditor.js"></script>
       
    </head>
   
    
    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a class="navbar-brand" href="{{route('dashboard.home')}}">Condo Fácil </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span> {{$_SESSION['usuario']->nome}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @if($_SESSION['usuario']->privilegio == 1 && $_SESSION['usuario']->condominio_id > 0)
                                <li><a href="{{route('condominio.index')}}">Meu condomínio</a></li>
                            @elseif($_SESSION['usuario']->privilegio == 1)
                                <li><a href="{{route('condominio.index')}}">Cadastrar Condomínio</a></li>
                            @endif
                            <li><a href="{{route('perfil.editar', $_SESSION['usuario']->id)}}">Editar Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('dashboard.logout')}}">Sair <span class="glyphicon glyphicon-log-in"></span></a>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <section class="msg-sys">
        <div class="container">
            @yield('painelMensagens')
        </div>
    </section>

    <section id="breadcrumb">
        <div class="container">
            <div class="col-xs-12 col-md-12">
                @yield('breadcrumb')
            </div>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="dash col-md-3">
                <!-- menu -->
                <div id="dashMenu">
                    <div class="list-group panel">
                        <a href="#" class="list-group-item active main-color-bg" data-parent="#dashMenu">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Dashboard
                        </a>
                        <a href="{{route('avisos.index')}}" class="list-group-item" data-parent="#dashMenu"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>&nbsp; Avisos</a>
                        <a href="#sub-dash" class="list-group-item" data-toggle="collapse" data-parent="#dashMenu"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp; Áreas Comuns
                        </a>
                          <div class="collapse" id="sub-dash">
                            @if($_SESSION['usuario']->privilegio == 1)
                                <a href="{{ route('area.index') }}" class="list-group-item">Cadastrar Área Comum</a>
                            @endif
                                <a href="{{ route('reservaArea.cadastro') }}" class="list-group-item">Reservar Área Comum</a>
                          </div>
                        @if($_SESSION['usuario']->privilegio == 1)
                            <a href="{{route('condomino.index')}}" class="list-group-item" data-parent="#dashMenu"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Condôminos</a>
                        @endif
                            <a href="{{ route('chamados.index') }}" class="list-group-item" data-parent="#dashMenu"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp; Contate o Síndico</a>
                    </div>
                </div>
            </div>

            <!-- Modal form to delete a form -->
            <div id="deleteModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-center">Deseja mesmo excluir?</h3>
                            <br />
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_delete">
                                </div>
                            </form>
                            <div class="modal-footer">
                                <a class="btn-acess btn btn-danger" id="link">Deletar</a>&nbsp;
                                <a class="btn-acess btn btn-primary" data-dismiss="modal">Fechar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div><!-- Container -->
    </section>


    <!-- Mascaras de Input's -->
    <script>
       (function( $ ) {
             $(function(){
             $("#valorReal").maskMoney({symbol:'R$ ', 
            showSymbol:false, thousands:'.', decimal:',', symbolStay: true});
             });
        })(jQuery);
    </script>

    <!-- SCRIPT MASCARA CAMPOS FORMULARIO -->  
    <script>
        jQuery(function ($) {
            $("#telUsuario").mask("(99) 99999-9999");
            $("#cepUsuario").mask("99999-999");
            $("#cpfUsuario").mask("999.999.999-99");
            $("#cnpjUsuario").mask("99.999.999/9999-99");
        });

    </script>
    
    <!-- SCRIPT MODAL CAMPO MENSAGEM -->   
    <script>
        CKEDITOR.replace( 'mensagem' );
    </script>

    <!-- Validação de Erros para o Modal( Avisos, Condôminos, Condomínios, Áreas Comuns)-->
    @if(Session::has('errors'))
        <script>
            $(document).ready(function(){
                $('#modal-mensagem').modal({show: true});
            });
        </script>
    @endif

    <!-- SCRIPT MODAL CAMPO DATA -->
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                showOtherMonths: true,
                selectOtherMonths: true,
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                dateFormat: 'dd/mm/yy',
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
        } );
    </script>

    <!-- SCRIPT MODAL EXCLUIR -->
    <script>
        $(document).on('click', '.delete-modal', function() {
            $('#id_delete').val($(this).data('id'));
            $('#deleteModal').modal('show');
            var id = $('#id_delete').val();
            var url_atual = window.location.href+"/" + id;
            
            $('#link').attr('href',url_atual);
        });
    </script>

    </body>
   
</html>
