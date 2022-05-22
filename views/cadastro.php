<?PHP
/* echo($_SESSION['img']) 
 */
session_start();


if (isset($_SESSION['usuario'])) {
    $id = $_SESSION['usuario'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro usuario</title>
    <link rel="stylesheet" href="../styles/App.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>

    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script language="javascript">
        var x = 0;

        function hola(x) {
            if (x == 0) {

                document.getElementById("cont2").style.display = "none";
            }

            if (x == 1) {

                document.getElementById("cont2").style.display = "none";
            }

            if (x == 2) {

                document.getElementById("cont2").style.display = "inline";
            }
        }
    </script>


</head>
<?php include '../modules/header.php' ?>

<body>
    <div class="fund_cads d-flex justify-content-center align-items-center">
        <div class="cartao boxS w-25 ">
            <h1> cadastro </h1>

            <div>
                <?php
                if (isset($_GET['erro'])) {
                    $erro = 'Usuario já cadastrado !';
                }

                ?>
                <div style="color: red ;">

                    <?php
                    echo $erro ?? ''

                    ?>
                </div>

                <div id="g_id_onload" data-client_id="913660317205-smg3tllrbtgunvtkbphp29pj4583elh3.apps.googleusercontent.com" data-context="signup" data-ux_mode="redirect" data-login_uri="http://localhost/modules/modelCadUser.php" data-auto_prompt="false">
                </div>

                <div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="filled_blue" data-text="$ {button.text}" data-size="large" data-logo_alignment="left">
                </div>
            </div>
            <form action="../modules/modelCadFarm.php" method="post">
                <div class="d-flex align-items-center">


                    <input type="checkbox" name="option" onclick="hola(2)" value="4" id="option" />
                    <label for="option" class="my-3">Desejo ser uma Farmacia parceira</label>

                </div>
                <div class="d-grid">
                    <div id="cont2" style="display:none ;">
                        <label for="gerente"> Usuario: <?php echo $id ?></label>
                        <input type="text" style="display:none ;" name="gerente" id="gerente" value="<?php echo $id ?>">
                        <label for="Nome">Razão social</label>
                        <input class="form-control" type="text" placeholder="Nome da Farmacia" id="Nome" name="Nome" />

                        <label for="cnpj">CNPJ</label>
                        <input class="form-control" type="text" placeholder="CNPJ da Farmacia" id="cnpj" name="cnpj" />

                        <label for="tell">telefone de contato</label>
                        <input class="form-control" type="text" placeholder=" numero de telefone da Farmacia" id="tell" name="tell" />

                        <label for="end">endereço</label>
                        <input class="form-control" type="text" placeholder="endereço da Farmacia" id="end" name="end" />

                        <button type="submit" class="btn btn-primary my-3 ">Fazer cadastro</button>
                    </div>
                </div>

            </form>
        </div>



    </div>
</body>

</html>