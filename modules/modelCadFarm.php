<?php
include_once("./conexao.php");
$acces =filter_input(INPUT_POST,'option');
$Name  =filter_input(INPUT_POST,'cnpj');
$farmacia =filter_input(INPUT_POST,'Nome');
$tell =filter_input(INPUT_POST,'tell');
$end =filter_input(INPUT_POST,'end');
$gerente =filter_input(INPUT_POST,'gerente');


$consulta= "SELECT * FROM u544289016_HomeFarmacy.UserTable where user like '$gerente' ";
$resp =mysqli_query($conn,$consulta);
$dado= mysqli_fetch_assoc($resp);
$usuario =$dado["user"];
$idUser=$dado['iduser'];
echo"Name: $usuario <br>  $idUser  descricao : $Name <br> Farmacia: $farmacia<br> tell: $tell<br> preço: $end<br> 
 
"; 
$result_cad="INSERT INTO `u544289016_HomeFarmacy`.`farmacia` (`NameFarmacia`, `created_at`, `tell`, `cnpj`, `idUserProp`)
 VALUES ('$farmacia', now(), '$tell', '$Name', '$idUser');";
$update="UPDATE `u544289016_HomeFarmacy`.`UserTable` SET `Acces` = '$acces' WHERE (`iduser` = '$idUser')";

$resultado_update=mysqli_query($conn,$update);

$resultado_cad=mysqli_query($conn,$result_cad);
if (mysqli_insert_id($conn)) {
    # code...
    header("Location: ../");

}
else{
    header("Location: ../");
}
