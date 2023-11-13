<?php

include 'conexao.php';  // include com arquivo de conexao
include 'resize-class.php'; // incluindo arquivo para redimencionar as imagens

//variáveis que vão receber os dados do formulário que esta na pagina formProduto
$nm_marca = $_POST['txtmarca'];
$cd_cat = $_POST['sltcat'];  // recebendo o valor do campo select, valor numérico
$nome_guitarra = $_POST['txtguitarra'];
$cd_marca = $_POST['sltmarca']; // recebendo o valor do campo select, valor numérico
$preco = $_POST['txtpreco'];
$qtde = $_POST['txtqtde'];
$ds_prod = $_POST['txtds'];
$et = $_POST['txtet'];
$lanc = $_POST['sltlanc'];

$remover2=','; // variável que vai receber a virgula
$preco = str_replace($remover2, '.', $preco); // substituindo , por .

//$remover1='.';  // criando variável e atribuindo o valor de ponto para ela
//$preco = str_replace($remover1, '', $preco); // removendo ponto de casa decimal,substituindo por vazio
//$remover2=','; // criando variável e atribuindo o valor de virgula para ela
//$preco = str_replace($remover2, '.', $preco); // removendo virgula de casa decimal,substituindo por ponto

$recebe_foto1 = $_FILES['txtfoto1'];

$destino = "imagens/";  // informando para qual diretorio será enviado a imagem


//gerando nome aleatorio para imagem
// preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
// do nome que esta na variavel $recebe_foto1 do parametro name e a $extensão vai receber o formato
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);

// a função md5 vai gerar um valor randomico  com base no horario "time"
// incrementar o ponto e a extensão
// função md5 é criado para gerar criptografia
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];


try {  // try para tentar inserir
	
	$inserir=$cn->query("INSERT INTO tbl_guitarra(nm_Marca, cd_categoria, nm_Guitarra, cd_Marca, vl_preco, qt_estoque,   ds_Guitarra, et_Guitarra, img_Guitarra, sg_lancamento) VALUES ('$nm_marca', '$cd_cat', '$nome_guitarra', '$cd_marca', '$preco', '$qtde', '$ds_prod', '$et', '$img_nome1', '$lanc')");

	
move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
$resizeObj = new resize($destino.$img_nome1);
$resizeObj -> resizeImage(450, 450, 'crop');
$resizeObj -> saveImage($destino.$img_nome1, 100);

header ('location:adm.php');
	
	
}catch(PDOException $e) {  // se houver algum erro explodir na tela a mensagem de erro
	
	
	echo $e->getMessage();
	
}

?>