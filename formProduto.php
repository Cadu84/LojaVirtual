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
	
	
	
$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});
$("#isbn").mask('000-00-000-0000-0');
	
});
	
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

	include 'conexao.php';	
	include 'nav.php';
	
    $consultaCategoria = $cn-> query("select * from tbl_Categoria");
    $consultaMarca = $cn-> query("select * from tbl_Marca");
	$consultarMarca = $cn->query("select * from tbl_Marca");
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Cadastro de Guitarras</h2>
				
				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">

				<div class="form-group">

				    <label for="txtmarca">Marca</label>

				    <select class="form-control" name="txtmarca">
					  <option value="">Selecione</option>
                      <?php while($listarMarca = $consultarMarca-> fetch(PDO::FETCH_ASSOC)) {?>
					  <option value="<?php echo $listarMarca ['nm_Marca']; ?>"><?php echo $listarMarca ['nm_Marca'];?></option>	
                      <?php } ?>	
					</select>
					
					</div>

					<div class="form-group">					
					
					<label for="sltcat">Categoria</label>
					
					<select class="form-control" name="sltcat">
					  <option value="">Selecione</option>
                      <?php while($listaCat = $consultaCategoria-> fetch(PDO::FETCH_ASSOC)) {?>
					  <option value="<?php echo $listaCat ['cd_categoria']; ?>"><?php echo $listaCat ['ds_categoria'];?></option>	
                      <?php } ?>				
					</select>
			
					</div>
					
					<div class="form-group">
				
						<label for="txtguitarra">Nome da Guitarra</label>
						<input name="txtguitarra" type="text" class="form-control" required id="txtguitarra">
					</div>
				
				    <div class="form-group">

					<label for="sltmarca">Código da Marca</label>
					
					<select class="form-control" name="sltmarca">
					  <option value="">Selecione</option>
                      <?php while($listaMarca = $consultaMarca-> fetch(PDO::FETCH_ASSOC)) {?>
					  <option value="<?php echo $listaMarca ['cd_Marca']; ?>"><?php echo $listaMarca ['nm_Marca'];?></option>	
                      <?php } ?>	
					</select>
					
					</div>					
					
					<div class="form-group">
				
					<label for="txtpreco">Preço</label>
					
					<input type="text" class="form-control"  name="txtpreco"  required id="txtpreco">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" required id="txtqtde">

					</div>

					<div class="form-group">

						<label for="txtds">Descrição do Produto</label>

						<textarea rows="8"class="form-control" name="txtds"></textarea>

					</div>

					
					
					<div class="form-group">
				
					<label for="txtet">Especificações Técnicas</label>
					
						<textarea rows="10" class="form-control" name="txtet"></textarea>
						
					</div>					
					
					
					<div class="form-group">
				
					<label for="txtfoto1">Foto Principal</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">

					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">
					  <option value="">Selecione</option>
					  <option value="S">Sim</option>
					  <option value="N">Não</option>					  
					</select>
						

					</div>
					
							
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>