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

    <title>Campos Guitar </title>
    <style type="text/css">
        .navbar{margin-bottom: 0;}
    </style>
</head>
<body>
    <?php 
    include 'nav.php';
    include 'cabecalho.html'; 
    include 'conexao.php';
    
    //Método GET serve para recuperar um dado. No caso foi criado uma variável chamada 'cat' para recuperar ou chamar os dados. Repare no 'nav.php'!.
    $cat = $_GET['cat'];

    //Variável consulta vai receber variável $cn que receberá o resultado de uma query
    $consulta = $cn->query("select nm_guitarra, vl_preco, img_guitarra, qt_estoque from vw_guitarra where ds_categoria = '$cat'"); 
    ?> 

    <div class="container-fluid">
        <div class="row">
            <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){?>
            <div class="col-sm-3">
                <img src="Imagens/<?php echo $exibe['img_guitarra']; ?>.jpg" class="img-responsive" style="width:100%">
                <div><h4><b><?php echo mb_strimwidth ($exibe['nm_guitarra'], 0, 30, '...');?></b></h4></div>
                 <div><h5>R$ <?php echo number_format ($exibe['vl_preco'], 3,'.',','); ?></h5></div>

                <div class="text-center">
                    <button class="btn btn-lg btn-block btn-default">
                        <span class="glyphicon glyphicon-info-sign" style="color:cadetblue"> Detalhes</span>

                    </button>
                </div>

                <div class="text-center" style="margin-top:5px; margin-bottom:5px;">
                    
                    <?php if($exibe["qt_estoque"] > 0) 
                    { ?>

                    <button class="btn btn-lg btn-block btn-info">
                        <span class="glyphicon glyphicon-usd"> Comprar</span>
                    </button>
                    <?php } 

                    else { ?>

                    <button class="btn btn-lg btn-block btn-danger" disabled>
                        <span class="glyphicon glyphicon-remove-circle"> Indisponível</span>
                    </button>
                    <?php } ?>                    
                </div>
 
            </div>
            <?php } ?>
        </div>
    </div>
    <?php include 'rodape.html' ?>
</body>
</html>