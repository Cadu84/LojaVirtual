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
        margin-top: 0;
        padding-bottom: 5px;
        padding-top: 5px;
        text-align: center;
        background-color: gray;
    }

    .rodape{
        margin-top: 0;
        margin-bottom: 0%;
        padding-top: 5px;
        padding-bottom: 5px;
    }
   </style>
</head>
<body>
    <?php 

    session_start();
    include 'conexao.php';
    include 'nav.php';

    $pesquisa = $_GET['data'];
    $consulta = $cn->query("select * from vw_Venda where dt_venda like concat ('%','$pesquisa','%')");

    if (empty($_GET['data'])) {
        echo "<html><script>location.href='index.php'</script></html>";
    }

    if ($consulta->rowCount() == 0) {
        echo '<script>
	window.location.href = "venda.php";
	alert("Nenhuma Venda foi encontrada nessa data!");
  </script>';
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="row-item">
                    <div class="col-sm-1 date-col"><p>Data: <?php echo date('d/m/Y', strtotime($exibe['dt_venda'])); ?></p></div>
                    <div class="col-sm-2 ticket-col"><p>NO.Ticket: <?php echo $exibe['no_ticket']; ?></p></div>
                    <div class="col-sm-5 product-col"><p>Nome do Produto: <?php echo $exibe['nm_Guitarra']; ?> </p></div>
                    <div class="col-sm-1 quantity-col"><p>Quantidade: <?php echo $exibe['qt_guitarra']; ?></p></div>
                    <div class="col-sm-2 total-col"><p>Valor Total: <?php echo number_format($exibe['vl_total_item'], 2, ',', '.'); ?></p></div>
                    <hr class="hr"/>
                    <br/><br/>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include 'rodape.html' ?>
</body>
</html>