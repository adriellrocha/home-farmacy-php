<?php
include_once("./conexao.php");
$nome =filter_input(INPUT_POST,'title');
$describe =filter_input(INPUT_POST,'SubTitle');
$farmacia =filter_input(INPUT_POST,'farmacia',FILTER_SANITIZE_STRING,45);
$type =filter_input(INPUT_POST,'Tipo',FILTER_SANITIZE_STRIPPED,45);
$preco =filter_input(INPUT_POST,'preco',FILTER_SANITIZE_STRING);
$recomendacion  =filter_input(INPUT_POST,'text' );

$file=$_FILES['src'];
$name_file='';

if (isset($file)){

    $extencao = strtolower(substr($_FILES['src']['name'],-4));
    $novo_name=md5(time()).$extencao;
    $diretorio = 'Uploads/';
    move_uploaded_file($_FILES['src']['tmp_name'],$diretorio.$novo_name);
    $name_file = $novo_name;

}


echo"Name: $nome <br> descricao : $describe<br> Farmacia: $farmacia<br> Type: $type<br> preço: $preco<br> 
recomedaçoes : $recomendacion<br> file: $file
"; 

$result_cad="INSERT INTO produto (NomeProduto,image,Descricao,FarmaciaName,preco,recomendacoes,typeProduto) VALUES ('$nome','$name_file','$describe','$farmacia','$preco','$recomendacion','$type')";
$resultado_cad=mysqli_query($conn,$result_cad);
if (mysqli_insert_id($conn)) {
    # code...
    header("Location: ../viewFormProduto.php");

}
else{
    header("Location: ../viewFormProduto.php");

}
