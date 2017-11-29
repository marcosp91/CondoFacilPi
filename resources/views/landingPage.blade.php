<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Condo Fácil - Landing Page</title>
        
        <!-- Bootstrap & CSS Bibliotecas -->
        <!-- <link href="/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="/css/estilo.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <meta property="og:url"           content="https://www.facebook.com/condofacilpi/" />
        <meta property="og:type"          content="CondoFácil" />
        <meta property="og:title"         content="CondoFácil PI" />
        <meta property="og:description"   content="Sistemas para condomínio" />
        <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
        <script>
            (function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
                  fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109857483-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-109857483-1');
        </script>

        <!-- End Google Analytics -->
    </head>
    <body>
        <div id="guardaNav">
            <div>
                <h5>Condo Fácil</h5>
            </div>
        </div>
        <div class="container">
            <div class="col-md-8 main">
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="comercial">
                                <div class="media">
                                    <img src="/img/logos/logo01.png" class="img-reponsive">
                                    <div class="media-body">
                                        <h3 class="mt-0">Controle de chamados para seu condomínio</h3>
                                        <div id="extra">
                                            <ul>
                                                <li>Postado por: Administrador</li>
                                                <li>Data: 15/11/2017</li>
                                                <li>Categoria: Condomínios</li>
                                            </ul>
                                        </div>
                                        <p>Tenha o controle de seus chamados como manutenção, sugestão ou reclamações de seus moradores.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3 sidebar">
                <div id="menuRedeSocial">
                    <h5>Curta nossa página</h5>
                    <hr>
                    <div class="fb-page"
                        data-href="https://www.facebook.com/condofacilpi/"
                        data-width="350" 
                        data-hide-cover="false"
                        data-show-facepile="true">
                    </div>
                </div>
                <div id="menuLanding">
                    <h5>Dicas para o Síndico</h5>
                    <hr>
                    <p>Descubra como realizar uma gestão qualíficada em seu condomínio.</p>
                    <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Saiba Mais</button>
                </div>  
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Dicas para o Síndico</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <h3>Como estabelecer as regras de condomínio.</h3>
                           <p>Para um síndico gerenciar seu
                                condomínio, as vezes pode ser
                                parecer uma tarefa difícil, pois exige
                                uma transparente gestão de serviços,
                                controle das finanças e também
                                conciliar os seus condôminos.
                                Mais existem técnicas quem podem
                                ajudar a criar um ambiente agradável
                                para todos.
                            </p>
                            <form class="form-horizontal" method="POST" action="{{route('index.landing')}}">
                                {{ csrf_field() }}
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" name="nome">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email">
                                <div class="form-group">
                                    <label for="cometario">Comentario</label>
                                    <textarea class="form-control" id="cometario" rows="3"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">PDF do material</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
