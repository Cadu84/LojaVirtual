<?php 
include 'conexao.php';

session_start(); //iniciando uma sessão

$Vemail = $_POST['txtemail'];
$Vsenha = $_POST['txtsenha'];

//echo $Vemail.'<br>';
//echo $Vsenha.'<br>';

$consulta = $cn->query("select cd_usuario, nm_usuario, ds_email, ds_senha, ds_status from tbl_usuario where ds_email = '$Vemail' and ds_senha = '$Vsenha'");
//rowCount vai verificar se existe uma linha. Se tem email cadastrado terá, senão não está cadastrado.
if($consulta->rowCount() == 1) { 
    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC); // criando uma variável que vai receber $consulta do tipo array

    if($exibeUsuario['ds_status'] ==0) {
    $_SESSION['ID'] = $exibeUsuario['cd_usuario']; //variável de sessao do tipo id recebe o código do usuário 
    $_SESSION['STATUS']=0;
    header('location:index.php'); //se o usuario existir, será direcionado para index.php
    }
    else{
        $_SESSION['ID'] = $exibeUsuario['cd_usuario']; //variável de sessao do tipo id recebe o código do usuário 
        $_SESSION['STATUS']=1;
        header('location:index.php'); //se o usuario existir, será direcionado para index.php
    }
}
else{
    header('location:erro.php'); // senão será direcionado para página erro.php
}

?>

