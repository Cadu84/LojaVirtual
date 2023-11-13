<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- atender as normas da lingua brasileira -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

    <title>Campos Guitar </title>
   <style class="text/css">
    .navbar{
        margin-bottom: 0;
    }
    .venda{
        text-align: center;
    }
 
   </style>
</head>
<body>
    <?php 

    session_start();
    include 'conexao.php';
    include 'nav.php'; 
    ?>
    
    <div class="venda">
    <h1 class="text-center">Consulta de Vendas</h1>
    <br/>
    <h2 class="text-center">Escolha uma Data para Consultar</h2>
    <br/>
    <form action="venda2.php" method="get">
        <label for="data"><b>DATA</b></label><br>
        <input type="date" id="data" name="data" required>
        <br/><br/><br/>
        <input type="submit" value="Pesquisar Data">
    </form>
</div> <!-- Feche a div corretamente -->
<?php include 'rodape.html' ?>
</body>
</html>