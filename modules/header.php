

<head>
<link rel="stylesheet" href="../styles/App.css">
<link rel="stylesheet" href="../styles/Nav.module.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</head>

<nav class="navbar navbar-expand-lg bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img src="../favicon.ico" alt="logo HOME FARMACY"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link link" href="../viewProdutos.php">Produto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link" href="../index.php#swot">Quem somos?</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link" href="../cadastro.php">tornar uma parceira </a>
        </li>
<?php 

if (isset($_SESSION['usuario'])) {
  
if ($_SESSION['acesso']>1) { 
    ?>
        <li class="nav-item dropdown">
          <a class="nav-link link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          admins
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item link" href="#">pagina dos administradores</a></li>
            <li><a class="dropdown-item link" href="../viewProdutoEdit.php">editar produtos</a></li>
            <li><hr class="dropdown-divider link"></li>
            <li><a class="dropdown-item link" href="#">Something else here</a></li>
          </ul>
        </li>
    
    <li class="nav-item">
        <a class="nav-link " href="../viewFormProduto.php">Cadastro Produto</a>
    </li>
    <?php 
}}
    ?>    


</ul>
      <form class="d-flex w-50" action="../viewProdutos.php" method="POST" role="search">
        <input class="form-control  me-2" type="search" placeholder="Qual o remédio que você prescisa?" name="pesq" aria-label="Search">
        <button class="btn box_somb btn-outline-primary" type="submit">pesquisar</button>
      </form>
      <?php 
        if (isset($_SESSION['usuario'])) {
          ?>
          <img src="<?php if (isset($_SESSION['img'])) {
    
            echo ($_SESSION['img']);
          }else {
            echo ('../styles/img/not-found.jpg');
          }
            ?>" class="perfil" alt="perfil" >
          <a href="../modules/logout.php"><img src="../styles/img/exit.png" width="25px" alt="saida"></a>
          <?php
        }else {
          ?>
          
          <a href="/login.php">
          <button class="btn box_somb btn-outline-primary" >
            login
          </button>
        </a>  
      <?php } ?>
    </div>
  </div>
</nav>