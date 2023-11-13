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
	
// se a sessão id estiver vazia ou se a sessão estatus for diferente de adm entao execute
	if(empty($_SESSION['STATUS']) || $_SESSION['STATUS'] != 1){
			header('location:index.php');  // redireciona para página index.php
	}
	
	
	include 'conexao.php';	
	include 'nav.php';
	
	$consulta = $cn->query("SELECT * from tbl_Guitarra");
	
	
	?>
	
<div class="container-fluid">
	
	
	<?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
	?>
	
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><img src="imagens/<?php echo $exibe['img_Guitarra']; ?>" class="img-responsive"></div>
		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $exibe['nm_Guitarra']; ?></h4></div>
		<div class="col-sm-2" style="padding-top:20px">
		
			
		<a href="frmAlterar.php?id=<?php echo $exibe['cd_Guitarra'];?>&id2=<?php echo $exibe['cd_categoria'];?>&id3=<?php echo $exibe['nm_Marca'];?>">
		<button class="btn btn-block btn-lg btn-warning" style="color:black">
		<span class="glyphicon glyphicon-pencil"> <b>Alterar</b></span>
		</button>
		</a>
		</div>
		
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
		<a href="erro4.php?id=<?php echo $exibe['cd_Guitarra']; ?>">	
		<button class="btn btn-lg btn-block btn-danger">
		<span class="glyphicon glyphicon-remove"> <b>Excluir</b></span>		
		</button>
		</a>		
		
		</div> 
				
	</div>		
	
	
	<?php } ?>
	

	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>