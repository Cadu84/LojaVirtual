<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
  
    <title>Login do Usuário</title>

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
	
	include 'conexao.php';	
	include 'nav.php';
	
	?>
	
	
	<div class="container-fluid"> <!-- classe que foi criada para redimencionar o layout, deixar responsivo -->
	
		<div class="row"> <!-- Criação de uma linha-->
		
			<div class="col-sm-4 col-sm-offset-4"> <!-- Criar coluna de 4 posições -->
				
				<h2>Login de Usuário</h2>
                <form name="frmusuario" method="post" action="validausuario.php">
				
					<div class="form-group"> <!-- formulário do bootstrap-->
				
						<label for="email">Email</label>
						<input name="txtemail" type="email" class="form-control" required id="email">
					</div>
				
				<div class="form-group"> <!-- digitação da senha -->
				
						<label for="senha">Senha</label>
						<input name="txtsenha" type="password" class="form-control" required id="senha">
				</div>
				
							
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-ok"> Entrar</span>
					
				</button>
				</form>	

				<a href="formusuario.php">
				<button type="button" class="btn btn-lg btn-link">
					
					Ainda não sou cadastrado
					
				</button>
                </a>

				<a href="esquecisenha.php">
					<button type="button" class="btn btn-lg btn-link" style="text-align:left;">

					Esqueci a senha
					
					</button>
				</a>
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>  
</body>
</html>