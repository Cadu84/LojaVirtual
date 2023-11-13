<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	
	
	</style>
	
	
	
</head>

<body>	
	
	<?php
	
	session_start();
	
	include 'conexao.php';	
	include 'nav.php';

	if(!empty($_GET['cd'])){ //se não estiver vazia a variável cd executa o código abaixo

    $cd_guitarra = $_GET['cd'];

    $consulta = $cn ->query("select * from vw_guitarra where cd_guitarra='$cd_guitarra'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	} 
	else // se estiver vazia será direcionado para página index.php
	{
		header("location:index.php");
	}
	
	?>
	
<div class="container-fluid">
	
	
	
  <div class="row">
		
		<div class="col-sm-4 col-sm-offset-1">
			 
			 <h1>Detalhes do Produto</h1>
			 
			 <img src="imagens/<?php echo $exibe['img_guitarra'];?>" class="img-responsive" style="width:100%;">
            			
	    </div>
		
				
 		<div class="col-sm-7"><h1><?php echo $exibe['nm_guitarra'];?></h1>
		
		 <h4><b>Marca:</b><?php echo $exibe['nm_marca'];?></h4>

		 <h4><b>Nome:</b><?php echo $exibe['nm_guitarra'];?></h4>

		 <h4><b></b><?php echo $exibe['ds_guitarra'];?></h4>

		 <h4><b></b><?php echo $exibe['et_guitarra'];?></h4>
		
		 <h4><b>Preço: </b>R$ <?php echo number_format ($exibe['vl_preco'], 3,'.','.'); ?></h4>

		 <?php if($exibe["qt_estoque"] > 0) 

		 {	?>

         <a href="carrinho.php?cd=<?php echo $exibe['cd_guitarra']; ?>">
		 <button class="btn btn-lg btn-success">Comprar</button>
		 </a>

		 <?php }

		 else

		 {?>
			<button class="btn btn-lg btn-danger" disabled>Indisponível</button>
		 <?php } ?>
		 

	    </div>	
			
	</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>