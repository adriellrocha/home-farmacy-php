<?php

use App\Session\User;
use Google\Client as GoogleClient;
use Google\Service\Spanner\Session;
session_start();
require_once '../vendor/autoload.php';
include("../app/Session/User.php");
include_once("./conexao.php");
$client = new GoogleClient(['client_id' => '913660317205-smg3tllrbtgunvtkbphp29pj4583elh3.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
if (isset($_POST['credential'])) {
    $payload = $client->verifyIdToken($_POST['credential']);
    echo ($payload['email']);
    echo ('</br>');
    # code...
}

if (isset($payload['email'])) {
    $nome = $payload['name'];
    $sub = $payload['sub'];
    $email = $payload['email'];
    $image = $payload['picture'];
    $givenName = $payload['given_name'];

    $consulta = "SELECT * FROM u544289016_HomeFarmacy.UserTable  where user like '$email' and  sub like '$sub' ";
    $resp = mysqli_query($conn, $consulta);
    $dado = mysqli_fetch_assoc($resp);
    if ($dado) {

        echo ($dado['user']);
        echo ('</br>');
        echo ('</br>');
        $_SESSION['usuario'] = $dado['user'];
        $_SESSION['acesso'] = $dado['Acces'];
        $_SESSION['img'] = $dado['perfil'];
        
        echo ($_SESSION['img']);
        header("Location: ../ ");
        exit;
    } else {
        header("Location: ../login.php?erro=true");
    }
} else {
    $nome = filter_input(INPUT_POST, 'user');
    $senha = filter_input(INPUT_POST, 'senha');
    $consulta = "SELECT * FROM u544289016_HomeFarmacy.UserTable  where user like '$nome' and senha like '$senha' ";
    $resp = mysqli_query($conn, $consulta);
    $dado = mysqli_fetch_assoc($resp);
    if ($dado) {
        $_SESSION['usuario'] = $dado['user'];
        $_SESSION['acesso'] = $dado['Acces'];
        header("Location: ../ ");
        exit;
    } else {
        header("Location: ../login.php?erro=true");
    }
}
die('   problemas ao execultar a api');
exit;
