<?php 
include("../modules/conexao.php");
$id = filter_input(INPUT_POST, 'pesq');
if($id){
    $consulta = "SELECT * FROM u544289016_HomeFarmacy.produto A INNER JOIN farmacia B on A.FarmaciaName = B.id where NomeProduto like '%$id%' or Descricao like'%$id%'";
}else {
    $consulta= "SELECT * FROM u544289016_HomeFarmacy.produto";
}
$resp =mysqli_query($conn,$consulta);



session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../styles/App.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <style>
    .img{
        
        height: 200px;
        width: 200px;
        object-fit:cover;
    }
    </style>
</head>
<?php include'../modules/header.php' ?>

<div class="chat">
    <a href="https://wa.me/557591510782?text=Ola%20gostaria%20de%20tirar%20uma%20duvida">

    <img src="/styles/img/whatsapp (1).png" alt="" srcset="">
</a>
</div>
<body class="bg-pd">
    <div className="navbar sessao_form ">

        <!-- <form action="" method="get" className="w-100 d-flex justify-content-evenly">
            <select className=" form-control w-50 custom-select-sm">
                <option selected>Filtro</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <input type="search" placeholder="Search" className="form-control w-50 mx-2" aria-label="Search" />


        </form> -->


    </div>

    <div className="mx-1">
        <div class="row  row-cols-1 row-cols-md-4 g-3 align-self-stretch">
            <?php  
            while ($dado= mysqli_fetch_assoc($resp)) {
    
            ?>


                <div class="col">
                    <div class="card ">
                        <div class=" d-flex justify-content-center">
                            
                            <img src="../modules/Uploads/<?php echo $dado["image"]  ?>" class="img"   alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dado["NomeProduto"]  ?></h5>
                            <p class="card-text"><?php echo $dado["Descricao"]  ?></p>
                            <h4 class="card-text">R$ <?php echo $dado["preco"]  ?></h4>
                            <form action=".\viewProdutoMais.php" method="post">

                                <div class="d-flex justify-content-evenly" >
                                    
                                    <button type="submit" name="but" value="<?php echo $dado["idproduto"]  ?>" class="btn btn-sm btn-outline-primary w-100">Mais informações</button> <!-- <a href="#" class="btn btn-sm btn-outline-primary ">adcionar ao carrinho</a> -->
                                </div>
                            </form>
                            <form action="../modules/pedidos.php" method="post">
                                <div class="w-100">
                                <button type="submit" name="but" value="<?php echo $dado["idproduto"]  ?>" class="btn btn-sm btn-outline-success w-100">Comprar agora</a>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
            </div>

    </div>
<?php include'../modules/footer.php' ?>

</body>

</html>