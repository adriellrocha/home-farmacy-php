<?php 
include("../modules/conexao.php");
$consulta= "SELECT * FROM u544289016_HomeFarmacy.farmacia";
$resp =mysqli_query($conn,$consulta);
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['acesso']> 1 ) {
    
    }
}else {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de troduto</title>
    <link rel="stylesheet" href="../styles//App.css">
    <link rel="stylesheet" href="../styles//index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</head>
<header>
<?php include'../modules/header.php' ?>
</header>
<body>
<div class="fund_cads d-flex justify-content-center align-items-center"  >
<div class="cartao ">
        <h1>Cadastro de produtos</h1>
        <form action="..\modules\modelProdutCad.php" enctype="multipart/form-data" method="POST" >
            <div class="sessao_form ">
                <label htmlFor="title">Nome do produto* </label>
                <input type="text "required="required" class="form-control " name="title" placeholder="nome do produto "  id="title"  />
            </div>
            <div class="sessao_form ">
                <label htmlFor="SubTitle">descrição </label>
                <input type="text" class="form-control" name="SubTitle" placeholder="descrição da marca tipo e peso do produto"  id="SubTitle"  />
            </div>
            <div class="sessao_form ">

                <label htmlFor="imagem ">imagem do produto </label>
                <input type="file" class="d-grid form-control row-cols-1 " name="src" placeholder="imagem do produto " id="imagem " />
            </div>
            <div class=" formGrid sessao_form ">
                <div class="mx-2 ">

                    
                <label htmlFor="farmacia">Farmacia*</label>
                    <select class="form-control " name="farmacia" id="farmacia ">
                    <?php  
            while ($dado= mysqli_fetch_assoc($resp)) {
    
            ?>
            <option value="<?php echo $dado["id"]  ?>"><?php echo $dado["NameFarmacia"]  ?></option>
              <?php
            }
            ?>
                       

                    </select>
                </div> 
                <div class=" mx-2 ">

                    <label htmlFor="tipo ">Tipo</label>
                    <select class="form-control " name="Tipo" id="tipo ">
                        <option value=" "></option>
                        <option value="1">capsula</option>
                        <option value="2">gotas</option>
                    </select>
                </div>
            <div class=" input-group h-25 mt-4 d-flex">
                <span class="input-group-text form-control w-25">R$</span>
                
                <input type="number" required="required" class="form-control w-75" name="preco" step="0.01" placeholder="00,00" id="preco"/>
            </div>
            </div>
            <div class="sessao_form ">
                <label htmlFor="Descricao ">Recomendações</label>
                <input type="text" required="required" class="form-control " placeholder="recomendações do produto " name="text" id="Descricao "/>
            </div>



            <button class="btn_HF " type="submit ">Salvar</button>
        </form>
    </div>
    </div>
    <?php include'../modules/footer.php' ?>


</body>
</html>