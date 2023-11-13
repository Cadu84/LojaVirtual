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
	
	
	
	
</head>

<body>
	
<?php
	
	
	session_start();

    // se a sessão id estiver vazia ou se a sessão status for diferente de adm, então execute
    if(empty( $_SESSION['STATUS'])  ||  $_SESSION['STATUS']  != 1)
    {
        header('location:index.php');  // redireciona para página index.php
    }
	
	// as váriáveis que irão exibir os campos desejados
	$cd = $_GET['id'];
	$cd2 = $_GET['id2'];
	$cd3 = $_GET['id3'];
	
	
	include 'conexao.php';	
	include 'nav.php';
	
	
	$consulta = $cn->query("SELECT * FROM tbl_Guitarra WHERE cd_Guitarra='$cd'");	
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	
	$consultaCategoria = $cn->query("SELECT cd_categoria, ds_categoria FROM tbl_Categoria where cd_categoria='$cd2' union select cd_categoria, ds_categoria FROM tbl_Categoria where cd_categoria !='$cd2'");
	
	$consultaMarca = $cn->query("SELECT cd_Marca, nm_Marca FROM tbl_Marca where cd_Marca='$cd3' union select cd_Marca, nm_Marca FROM tbl_Marca where cd_Marca !='$cd3'");
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração de produto</h2>
				
				<form method="post" action="alterarProduto.php?cd_altera=<?php echo $cd; ?>" name="incluiProd" enctype="multipart/form-data">
				
					<div class="form-group">					

						<label for="sltcat">Categoria</label>

						<select class="form-control" name="sltcat">
							<?php					
								while($exibecat = $consultaCategoria->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibecat['cd_categoria'];?>"><?php echo $exibecat['ds_categoria'];?></option>;
							<?php }	?>	
						</select>
					</div>
					
					<div class="form-group">
				
						<label for="txtGuitarra">Nome da Guitarra</label>
						<input type="text" name="txtGuitarra" value="<?php echo $exibe['nm_Guitarra']; ?>"  class="form-control" required id="txtGuitarra">
					</div>
					
					<div class="form-group">					

						<label for="sltMarca">Marca</label>

						<select class="form-control" name="sltMarca">
							<?php					
								while($exibeMarca = $consultaMarca->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibeMarca['cd_Marca'];?>"><?php echo $exibeMarca['nm_Marca'];?></option>;
							<?php }	?>	
						</select>
					</div>
		
					
					<div class="form-group">
				
					<label for="preco">Preço</label>
					
					<input type="text" class="form-control" required name="txtpreco" value="<?php echo $exibe['vl_preco']; ?>" id="preco">

					</div>
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" value="<?php echo $exibe['qt_estoque']; ?>" required id="txtqtde">

					</div>

                    <div class="form-group">

						<label for="txtds">Descrição do Produto</label>

						<textarea rows="8"class="form-control" name="txtds"><?php echo $exibe['ds_Guitarra']; ?></textarea>

					</div>
					
					
					<div class="form-group">
				
					<label for="txtet">Especificações Técnicas</label>
					
						<textarea rows="8" class="form-control" name="txtet"><?php echo $exibe['et_Guitarra']; ?></textarea>
						
					</div>	
					
					<div class="form-group">
				
					<label for="txtfoto1">Foto Principal</label>
					
					<input type="file" accept="imagens/*" class="form-control" name="txtfoto1" id="foto1">

					</div>
					
					<div class="form-group">
						
					<img src="imagens/<?php echo $exibe['img_Guitarra']; ?>" width="100px" >
						
					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">					  				
					<!-- se o sg_lancamento == S este valor estará selecionado senão vazio -->
					<option value="S" <?=($exibe['sg_lancamento'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['sg_lancamento'] == 'N')?'selected':''?>>Não</option>	  
					</select>
						

					</div>
						
					<button type="submit" class="btn btn-block btn-lg btn-warning" style="color:black">
					
					<span class="glyphicon glyphicon-pencil"> <b>Alterar</b> </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
</body>
</html>