<?php
include("../modules/conexao.php");
$id = filter_input(INPUT_POST, 'but');
$consulta = "SELECT * FROM u544289016_HomeFarmacy.produto A INNER JOIN farmacia B on A.FarmaciaName = B.id where idproduto like '$id'";
$resp = mysqli_query($conn, $consulta);
$dado = mysqli_fetch_assoc($resp);
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produto</title>
    <link rel="stylesheet" href="../styles/App.css">
    <link rel="stylesheet" href="../styles/view.produt.css">

    <link rel="stylesheet" href="../styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    
</head>
<header>
    <?php include '../modules/header.php' ?>
</header>
<div class="chat">
    <a href="https://wa.me/557591510782?text=Ola%20gostaria%20de%20tirar%20uma%20duvida">

    <img src="/styles/img/whatsapp (1).png" alt="" srcset="">
</a>
</div>
<body>
    <div class="fund_cads d-flex justify-content-center align-items-center">
        <div class="cartao ">

            <h2><?php echo $dado["NomeProduto"]  ?></h2>
            <div class=" d-flex">
                <div class=" bDivImg ">
                    <img src="../modules/Uploads/<?php echo $dado["image"]  ?>" class="img" alt="" srcset="">

                </div>
                <div class="text  ">
                    <p><?php echo $dado["Descricao"]  ?></p>
                    <h6>Vendido e entregue por <?php echo $dado["NameFarmacia"]  ?></h6>
                    <h3> R$ <?php echo $dado["preco"]  ?></h3>
                    <p><?php echo $dado["recomendacoes"]  ?></p>
                    <form action="../modules/pedidos.php" method="post">
                        <button type="submit" name="but" value="<?php echo $dado["idproduto"]  ?>" class="btn but btn-success ">comprar</button>
                    </form>

                </div>
            </div>
        </div>



    </div>
</body>

</html>