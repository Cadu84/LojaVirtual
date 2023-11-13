<?php

include 'conexao.php';  

$cd_usuario = $_GET['cd_usuario']; 


$consulta = $cn->query("SELECT * FROM tbl_usuario WHERE nm_usuario='$cd_usuario'"); 
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$nome = $_POST['txtnome'];  
$email = $_POST['txtemail'];  
$senha = $_POST['txtsenha'];
$endereço = $_POST['txtend'];
$cidade = $_POST['txtcidade'];
$CEP = $_POST['txtcep'];


try {
	
	$alterar = $cn->query("UPDATE tbl_usuario SET  
	
	nm_usuario = '$nome',
	ds_email = '$email',
	ds_senha = '$senha',
	ds_endereco = '$endereço',
	ds_cidade= '$cidade',
	no_cep = '$CEP'
	WHERE cd_usuario = '$cd_usuario' 	
	"); 
	
	echo '<script>alert("Atualizado com sucesso!");</script>';
    echo '<script>window.location.href = "index.php";</script>';
    exit();
	
} catch(PDOException $e) {  
	
	echo $e->getMessage();  
	
}



?>