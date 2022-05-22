<?PHP
include("../modules/conexao.php");
$id = filter_input(INPUT_POST, 'but');
$consulta = "SELECT * FROM u544289016_HomeFarmacy.produto A INNER JOIN farmacia B on A.FarmaciaName = B.id where A.idproduto like '$id'";
$resp =mysqli_query($conn,$consulta);
$dado = mysqli_fetch_assoc($resp);


?>

<html>
<meta http-equiv="refresh" content="1; URL='https://wa.me/<?php echo $dado["tell"]?>?text=Ola%20gostaria%20de%20solicitar%20o%20produto%20<?php echo $dado["NomeProduto"]  ?>%20do%20que%20tem%20o%20preço%20<?php echo $dado["preco"]  ?>%20no%20endereço%20X'"/>
</html>

<h1>
    caso nao carregue 
    <a href="https://wa.me/<?php echo $dado["tell"]?>?text=Ola%20gostaria%20de%20solicitar%20o%20produto%20<?php echo $dado["NomeProduto"]  ?>%20do%20que%20tem%20o%20preço%20<?php echo $dado["preco"]  ?>%20no%20endereço%20X">
        click aqui 
    </a>
        pra finalizar a compra
    </h1>
          