<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Marca e alternância são agrupados para melhor exibição em dispositivos móveis-->
    <div class="navbar-header"> <!--div navbar botão hamburguer -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"> Books on-line <img src="imagens/livros.png" alt="livrosNavbar"></a>
    </div>
    <!-- Colete os links de navegação, formulários e outros conteúdos para alternar -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Lançamentos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Designer</a></li>
            <li><a href="#">Infra-Estrutura</a></li>
            <li><a href="#">Dados</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Front End</a></li>
            <li><a href="#">Mobile</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Contato</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"> Logon </span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>