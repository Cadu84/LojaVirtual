<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja - Logon de usuário</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<script src="jquery.mask.js"></script>

<script>
	
	
/* mscara para o preço */	
/*$(document).ready(function(){
	
    $('#preco').mask('000.000.000.000.000,00', {reverse: true});	
        
    });*/
	
</script>
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
</style>
	

<body>
	
<?php

session_start();

include 'conexao.php';
include 'nav.php';

$cd_usuario = $_GET['cd_usuario'];

$consulta = $cn->query("SELECT * FROM tbl_usuario WHERE cd_usuario='$cd_usuario'"); // trazendo id pelo nome
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 custom-form">
			<h1 class="text-center">Conta do cliente</h1>
			<form method="post" action="alteraConta.php?IdUser=<?php echo $cd_usuario; ?>" name="incluiProd" enctype="multipart/form-data">
				<div class="form-group">
					<label for="txtnome"></label>
					<h3 class="text-center">Nome</h3>
					<input type="text" name="txtnome" value="<?php echo $exibe['nm_usuario']; ?>" class="form-control" required id="txtnome">
				</div>
				<div class="form-group">
					<label for="txtemail"></label>
					<h3 class="text-center">Email</h3>
					<input type="email" name="txtemail" value="<?php echo $exibe['ds_email']; ?>" class="form-control" required id="txtemail">
				</div>
				<div class="form-group">
					<label for="txtsenha"></label>
					<h3 class="text-center">Senha</h3>
					<input type="text" name="txtsenha" value="<?php echo $exibe['ds_senha']; ?>" class="form-control" required id="txtsenha">
				</div>
				<div class="form-group">
					<label for="txtend"></label>
					<h3 class="text-center">Endereço</h3>
					<input type="text" name="txtend" value="<?php echo $exibe['ds_endereco']; ?>" class="form-control" required id="txtend">
				</div>
				<div class="form-group">
					<label for="txtcidade"></label>
					<h3 class="text-center">Cidade</h3>
					<input type="text" name="txtcidade" value="<?php echo $exibe['ds_cidade']; ?>" class="form-control" required id="txtcidade">
				</div>
				<div class="form-group">
					<label for="cep"></label>
					<h3 class="text-center">CEP</h3>
					<input name="txtcep" type="text" value="<?php echo $exibe['no_cep']; ?>" class="form-control" required id="cep">
				</div>
				<button type="submit" class="btn btn-lg btn-primary"> Atualizar</button></a>
			</form>
			<br />
			<a href="areaUser.php">
				<button type="submit" class="btn btn-lg btn-success"> Minhas Compras</button></a>
		</div>
	</div>
</div>
<?php include 'rodape.html' ?>
</body>

</html>