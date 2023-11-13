<style>
  .navbar{
    padding-bottom: 40px;
    padding-top: 0%;
    margin-top:0%;
  }
  .navbar-brand{
    padding-top: 0px;
    margin-top: 0%;
  }
  .collapse{
    padding-top: 35px;

  }

</style>

<nav class="navbar navbar-inverse" style="background-color:#111A2C;">
  <div class="container-fluid">
    <!-- Marca e alternância são agrupados para melhor exibição em dispositivos móveis-->
    <div class="navbar-header"> <!--div navbar botão hamburguer -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="imagens/CamposGuitar (2).jpg" alt="" style=""></a>
    </div>
    <!-- Colete os links de navegação, formulários e outros conteúdos para alternar -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="lanc.php">Lançamentos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Categorias</b> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categoria.php?cat=Stratocaster">Stratocaster</a></li>
            <li><a href="categoria.php?cat=Les Paul">Les Paul</a></li>
            <li><a href="categoria.php?cat=TeleCaster">TeleCaster</a></li>
            <!-- <li role="separator" class="divider"></li> -->
            <li><a href="categoria.php?cat=SG">SG</a></li>
            <li><a href="categoria.php?cat=Flying V">Flying V</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Marcas<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="marca.php?mar=Fender">Fender</a></li>
            <li><a href="marca.php?mar=Gibson">Gibson</a></li>
            <li><a href="marca.php?mar=Ibanez">Ibanez</li>
            <li><a href="marca.php?mar=Epiphone">Epiphone</a></li>
            <li><a href="marca.php?mar=Yamaha">Yamaha</a></li>
            <li><a href="marca.php?mar=Squier">Squier</li>
            <li><a href="marca.php?mar=Marshall">Marshall</a></li>
            <li><a href="marca.php?mar=Gretsch">Gretsch</a></li>
            <li><a href="marca.php?mar=Takamine">Takamine</a></li>
            <li><a href="marca.php?mar=Jackson">Jackson</a></li>
            <!-- <li role="separator" class="divider"></li> -->
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" name="frmpesquisa" method="get" action="busca.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Digite sua pesquisa" name="txtPesquisar">
        </div>
        <button type="submit" class="btn btn-default">Pesquisar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"></span>Carrinho</a></li>
        <?php if(empty($_SESSION['ID'])){ ?> <!-- se estiver vazio a sessao id mostra menu logon -->
        <li><a href="formlogon.php"><span class="glyphicon glyphicon-log-in">Login</span></a></li>
        <?php } else { //senão estiver vazio a sessao id verificar...

          if($_SESSION['STATUS'] == 0) { // se a sessão status valer 0 mostrar nome do usuário
          $consulta_usuario = $cn->query("select nm_usuario, cd_usuario from tbl_usuario where cd_usuario = '$_SESSION[ID]'");
          $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
        ?>

        <li><a href="alterarConta.php?cd_usuario=<?php echo $exibe_usuario['cd_usuario']; ?>"><span class="glyphicon glyphicon-user"> <?php echo $exibe_usuario['nm_usuario'];?> </span></a><li>
          
        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</span></a><li>
        <?php }else {?> <!-- senão a sessão is só pode valer 1, sendo assim cria um botão -->
          <li><a href="adm.php"><button class="btn btn-sm btn-danger">Administrador </button></a><li>
        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</span></a><li>

        <?php } }?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>