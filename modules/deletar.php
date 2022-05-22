<?php
include("../modules/conexao.php");
$id = filter_input(INPUT_POST, 'but');
echo $id;

$consulta = "delete FROM produto  WHERE idproduto = '$id' ";

$resp = mysqli_query($conn, $consulta);

header('Location: ../viewProdutoEdit.php');
