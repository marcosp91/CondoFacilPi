<!DOCTYPE html>
<html lang="pt">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Software para Gestão de Condomínios</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/creative.min.css" rel="stylesheet">


  </head>

  <body id="page-top">
      
      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
       @endif

    <!-- Titulo Página -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Condo Fácil </a>
	    <!--  Portal -->
        <div id="login" class="navbar-nav ml-auto">
        	<a class="nav-login" href="{{route('login.index')}}">Acesse o Portal</a>
        </div>
       </div>
    </nav>
    <!--  Título Inicio -->
    <header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">O sistema para o dia a dia do seu condomínio.</h1>
          <!---
          <hr>
          <p>Condo Fácil possui as melhores ferramentas para auxiliar na gestão de condôminos, reserva de áreas comuns, serviços terceirizados e muito mais! Não perca mais tempo utilizando planilhas, cadastre-se agora e comece já a utilizar o Condo Fácil!</p>-->
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Saiba Mais</a>
        </div>
      </div>
    </header>
    <!--  Chamada de Propaganda -->
    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Tudo que você precisa em um único sistema!</h2>
            <hr class="light">
            <p class="text-faded">Utilizando Condo Fácil você tem em mãos o poder de gerenciar todas as depêndecias do seu condomínio, controle total sobre condôminos, cadastro e reservas de areás comuns, contato direto ao síndico facilitando a comunicação entre os moradores.</p>
            <a class="btn btn-default btn-xl js-scroll-trigger" href="#services">COMEÇAR AGORA!</a>
          </div>
        </div>
      </div>
    </section>
    <!--  Chamada de Serviços -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Ferramentas de Serviços</h2>
            <hr class="primary">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
              <h3>Gerenciamento de Condôminos</h3>
              <p class="text-muted">Controle total sobre seus usuários.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
              <h3>Áreas Comuns</h3>
              <p class="text-muted">Realize reservas de ambientes compartilhados de modo ágil e fácil.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
              <h3>Abertura de Chamados</h3>
              <p class="text-muted">Gerencie o atendimento terceirizado de serviços.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
               <h3>Contate o Síndico</h3>
              <p class="text-muted">Permite a comunicação dos condôminos direta ao síndico.</p>
          </div>
        </div>
      </div>
    </section>


    <!-- Aguardando desenvolvimento de Imagens -->
    <!--
    <section class="p-0" id="portfolio">
      <div class="container-fluid">
        <div class="row no-gutter popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Cadastro
                  </div>
                  <div class="project-name">
                    CONDÔMINOS
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Reserva
                  </div>
                  <div class="project-name">
                    ÁREAS COMUNS
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Abertura
                  </div>
                  <div class="project-name">
                    CHAMADOS
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Contate
                  </div>
                  <div class="project-name">
                    SÍNDICO
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Gerenciar
                  </div>
                  <div class="project-name">
                    ÁREAS COMUNS
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Gerenciar
                  </div>
                  <div class="project-name">
                    USUÁRIOS
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    -->
    <!--  Chamada Sindíco -->
    <div class="call-to-action bg-dark">
      <div class="container text-center">
        <a class="btn btn-default btn-xl sr-button" href="#">Você pode ser o próximo síndico!</a>
      </div>
    </div>
    <!--  Chamada Rodapé -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Alguma dúvida?</h2>
            <hr class="primary">
            <p>Nossa equipe é especializada para oferecer treinamento e apoio ao usuário!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-map-marker fa-3x sr-contact"></i>
			<p>Rua Univali, nº1120</p>
			<p>Itajaí, Santa Catarina</p>
            <p>88300-000</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-paper-plane fa-3x sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">equipe@condofacil.com.br</a>
			  <p>47-3344-0000</p>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>