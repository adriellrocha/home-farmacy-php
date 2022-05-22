<?php
include_once("./conexao.php");
$id =filter_input(INPUT_POST,'id');
$nome =filter_input(INPUT_POST,'title');
$describe =filter_input(INPUT_POST,'SubTitle');
$farmacia =filter_input(INPUT_POST,'farmacia',FILTER_SANITIZE_STRING,45);
$type =filter_input(INPUT_POST,'Tipo',FILTER_SANITIZE_STRIPPED,45);
$preco =filter_input(INPUT_POST,'preco',FILTER_SANITIZE_STRING);
$recomendacion  =filter_input(INPUT_POST,'text' );
/* 
$file=$_FILES['src'];
$name_file='';

if (isset($file)){

    $extencao = strtolower(substr($_FILES['src']['name'],-4));
    $novo_name=md5(time()).$extencao;
    $diretorio = 'Uploads/';
    move_uploaded_file($_FILES['src']['tmp_name'],$diretorio.$novo_name);
    $name_file = $novo_name;

} */

//UPDATE `u544289016_HomeFarmacy`.`produto` SET `NomeProduto,image,Descricao,FarmaciaName,preco,recomendacoes,typeProduto` = '$nome','$name_file','$describe','$farmacia','$preco','$recomendacion','$type' WHERE (`id` = '$id')
echo"Name: $nome <br> descricao : $describe<br> Farmacia: $farmacia<br> Type: $type<br> preço: $preco<br> 
recomedaçoes : $recomendacion<br> file: $id
"; 

$result_cad="UPDATE `u544289016_HomeFarmacy`.`produto` SET `NomeProduto` = '$nome', `Descricao` = '$describe', `FarmaciaName` = '$farmacia', `typeProduto` = '$type', `preco` = '$preco', `recomendacoes` = '$recomendacion' WHERE (`idproduto` = '$id')";
$resultado_cad=mysqli_query($conn,$result_cad);
if (mysqli_insert_id($conn)) {
    # code...
    header("Location: ../viewProdutoEdit.php?erro=true");

}
else{
    header("Location: ../viewProdutoEdit.php");

}
