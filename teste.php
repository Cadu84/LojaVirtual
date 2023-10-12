<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Produtos</title>
</head>
<body>
    <?php
    include 'conexao.php';
    $consulta = $cn->query('select * from vw_Guitarra'); /*query é usado para consulta */
    while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ /*variável exibe recebe a variável consulta que está utilizando um método que se chama FETCH_ASSOC que tranforma a consulta em um tipo array (uma matriz tabela)*/

    echo $exibe[' nm_Guitarra'].'<br>';
    echo $exibe['vl_preco'].'<br>';
    echo $exibe['ds_categoria'].'<br>';
    echo '<hr>';
    }
    ?>  
</body>
</html>