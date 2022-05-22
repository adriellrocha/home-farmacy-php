<?php
include("/xampp/htdocs/modules/conexao.php");

    $consulta= "SELECT * FROM u544289016_HomeFarmacy.produto limit 4";
$resp =mysqli_query($conn,$consulta);


use App\Session\User;

include('./app/Session/User.php');
$login = new User();
if ($login->isLogged()) {
?>
    
    <script>
    console.log('esta logado');
    </script>
    <?php
}
else {
    ?>
    <script>
        
        console.log('nao esta logado');
    </script>
    <?php
}

?>
<script>
    console.log('so testando');

</script>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME_FARMACY</title>
    <link rel="stylesheet" href="./styles/App.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>
</head>

<?php include'./modules/header.php' ?>
<div class="chat">
    <a href="https://wa.me/557591510782?text=Ola%20gostaria%20de%20tirar%20uma%20duvida">

    <img src="/styles/img/whatsapp (1).png" alt="" srcset="">
</a>
</div>
<body class="bg-pd">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./styles/img/banner2.jpeg" class="d-block w-100" alt="Firts slide">
    </div>
    <div class="carousel-item">
      <img src="./styles/img/pixellart.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./styles/img/banner2.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <div>

        <section class="mt-5">
            <div class="row row-cols-1 row-cols-md-4 g-4">
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

        </section>
        <article class="mt-4 fund_article" id="swot">
            <div class="div_article">

                <div class="mx-auto apresent   ">
                    <div class="title_center">
                        <h1> <strong class="">Quem Somos?</strong></h1>
                        <p>
                            Somos uma plataforma de serviços farmacêuticos que visa facilitar a compra e a entrega dos
                            medicamentos a seus usuários.
                        </p>

                    </div>
                    <div class="title_center">
                        <h1> <strong>Missão</strong></h1>
                        <p>
                            Facilitar a vida das pessoas, através do acesso à orientação médica, bem como a entrega de
                            produtos farmacêuticos.
                        </p>
                    </div>
                    <div class="title_center">
                        <h1> <strong>Visão</strong></h1>
                        <p>
                            Ser uma empresa referência na venda e no acompanhamento na utilização de produtos
                            farmacêuticos,<br /> prestando serviços em âmbito nacional, transformando vidas de nossos
                            clientes para que tenham uma saúde de qualidade.
                        </p>
                    </div>
                    <div class="title_center">
                        <h1> <strong>Valores</strong></h1>
                        <p>
                            Cuidar de quem precisa, lhes dando atenção, visando a sua saúde.
                        </p>
                    </div>
                </div>

            </div>
        </article>

    </div>
    <?php include'./modules/footer.php' ?>
</body>

</html>