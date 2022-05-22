
<?PHP 
/* echo($_SESSION['img']) 
 */
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="../styles/App.css">
  <link rel="stylesheet" href="../styles/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
  <script src="https://accounts.google.com/gsi/client" async defer></script>

</head>
<?php include '../modules/header.php' ?>

<body>
  <div class="fund_cads d-flex justify-content-center align-items-center">
    <div class="cartao boxS w-25 ">
      <h1> login </h1>
      <div>
      <?php
                if (isset($_GET['erro'])) {
                    $erro = 'Usuario não existe !';
                }

                ?>
                <div  style="color: red ;">

                    <?php
                    echo $erro ?? ''

                    ?>
        <div id="g_id_onload" data-client_id="913660317205-smg3tllrbtgunvtkbphp29pj4583elh3.apps.googleusercontent.com" data-context="signup" data-ux_mode="redirect" data-login_uri="http://localhosts/modules/modelLogin.php" data-auto_prompt="false">
        </div>

        <div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="filled_blue" data-text="$ {button.text}" data-size="large" data-logo_alignment="left">
        </div>
      </div>
      <form action="../modules/modelLogin.php" method="post">
        <div>
          <label for="user">Usuario</label>
          <input class="form-control" type="text" name="user" id="user" />
        </div>
        <div>
          <label for="senha">Senha</label>
          <input type="password" class="form-control" name="senha" id="senha" />
        </div>
        <div class=" d-grid">

         <!-- <a href="*"> esqueci minha senha</a> -->
          <button type="submit" class="btn btn-primary  my-2">login</button>
        </div>
      </form>
      <a href="./cadastro.php"><button class="btn w-100 btn-primary">Fazer cadastro</button></a>



    </div>

  </div>
</body>

</html>