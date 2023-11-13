<?php

include 'conexao.php';  // incluindo a conexao
include 'resize-class.php'; // classe para redimensionar imagem

$cd_Guitarra = $_GET['cd_altera'];  // variavel recebe o código da guitarra que acabamos de receber do formulário

// abaixo criando a consulta pelo codigo da guitarra que recebemos acima
$consulta = $cn->query("SELECT img_Guitarra FROM tbl_Guitarra WHERE cd_Guitarra='$cd_Guitarra'"); 

//criando uma array 
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


// todas as laterações feitas nos campos serão salvas nas variaveis abaixo

$categoria = $_POST['sltcat'];  // armazenando o valor de sltcat na variavel $categoria
$guitarra = $_POST['txtGuitarra'];
$marca = $_POST['sltMarca'];
$preco = $_POST['txtpreco'];
$descricao = $_POST['txtds'];
$et = $_POST['txtet'];
$qtde = $_POST['txtqtde'];
$lanc = $_POST['sltlanc'];

$remover2=','; // variável que vai receber a virgula
$preco = str_replace($remover2, '.', $preco); // substituindo , por .

$recebe_foto1 = $_FILES['txtfoto1'];  // recebendo conteudo do campo file


$destino = "imagens/";  //pasta aonde será feito upload da imagem


if (!empty($recebe_foto1['name'])) { // se a propriedade name[propriedade que pega o nome da imagem ] não estiver vazia faça

	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1); // pegar extensão
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1]; //gerar nome unico para img, enviar esta variável

	$upload_foto1=1; // se variavel criada for 1 precisará trocar imagem

}

else {  // caso não haja alteração na imagem, pegar o nome da imagem que está no banco
	
	$img_nome1=$exibe['img_Guitarra'];
	$upload_foto1=0;  // zero pq não fará atualização de fotos
	
}
	

try {
	// comando update para realizar as trocas
	$alterar = $cn->query("UPDATE tbl_Guitarra SET  
	
	cd_categoria = '$categoria',
	nm_Guitarra = '$guitarra',
	cd_Marca = '$marca',
	vl_preco = '$preco',
	qt_estoque = '$qtde',
	ds_Guitarra = '$descricao',
    et_Guitarra = '$et',
	img_guitarra = '$img_nome1',
	sg_lancamento = '$lanc'	
	
	WHERE cd_Guitarra = '$cd_Guitarra' 	
	"); // as alterações serão feitas baseadas pelo codigo que recebemos
	
	
	if ($upload_foto1==1) {  // se a foto1 for igual a 1 é pq foi feito alteração será feita
		
		
		move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
		$resizeObj = new resize($destino.$img_nome1);
		$resizeObj -> resizeImage(450, 450, 'crop');
		$resizeObj -> saveImage($destino.$img_nome1, 100);
		
	}
	
	header('location:adm.php');  // redirecionando para a pagina menu principal (se tudo der certo)
	
} catch(PDOException $e) {  // se exsitir algum problema, será gerado uma mensagem de erro
	
	
	echo $e->getMessage();  
	
}



?>