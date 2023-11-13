<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja - Login de usuário</title>
	
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

    // se a sessão id estiver vazia ou se a sessão status for diferente de adm, então execute
    if(empty( $_SESSION['STATUS'])  ||  $_SESSION['STATUS']  != 1)
    {
        header('location:index.php');  // redireciona para página index.php
    }

	
	include 'conexao.php';	
	include 'nav.php';
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4 text-center">
				
				<h2><b>Área administrativa</b></h2>
				
				
				<a href="formProduto.php">			
				<button type="submit" class="btn btn-block btn-lg btn-primary">
					
					<b>Incluir Produto</b>
					
				</button>
					
				</a>
				
                <br>
				
				<a href="lista.php">
				<button type="submit" class="btn btn-block btn-lg btn-warning">
					
					<b>Alterar / Excluir Produto</b>
					
				</button>	

                </a>

                <br>
				
				<a href="venda.php">
				<button type="submit" class="btn btn-block btn-lg btn-success">
					
					<b>Vendas</b>
               
				</button>
				</a>
				
                <br>
				
			    <a href="sair.php">
				<button type="submit" class="btn btn-block btn-lg btn-danger">
					
					<b>Sair da área administrativa</b>
					
				</button>

                </a>
				
				
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>