<?php 
include 'conexao.php';

$Vemail = $_POST['txtemail'];
$Vsenha = $_POST['txtsenha'];

//echo $Vemail.'<br>';
//echo $Vsenha.'<br>';

$consulta = $cn->query("select cd_usuario, nm_usuario, ds_email, ds_senha, ds_status from tbl_usuario where ds_email = '$Vemail' and ds_senha = '$Vsenha'");
//rowCount vai verificar se existe uma linha. Se tem email cadastrado terá, senão não está cadastrado.
if($consulta->rowCount() == 1) { 
    echo 'usuario Está Cadastrado';
}
else{
    echo 'usuario NÃO Cadastrado';
}

?>

