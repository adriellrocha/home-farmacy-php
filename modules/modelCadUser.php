<?php

use App\Session\User;
use Google\Client as GoogleClient;
use Google\Service\Spanner\Session;

require_once '../vendor/autoload.php';
include("../app/Session/User.php");
include_once("./conexao.php");

$client = new GoogleClient(['client_id' => '913660317205-smg3tllrbtgunvtkbphp29pj4583elh3.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
if (isset($_POST['credential'])) {
    $payload = $client->verifyIdToken($_POST['credential']);
    
}
if (isset($payload['email'])) {
    $nome = $payload['name'];
    $sub = $payload['sub'];
    $email = $payload['email'];
    $image = $payload['picture'];
    $givenName = $payload['given_name'];
    $consulta = "SELECT * FROM UserTable where user like '$email' and sub like '$sub'";
    $resp = mysqli_query($conn, $consulta);
    $dado = mysqli_fetch_assoc($resp);

    if ($dado) {
        echo ('usuario ja existe');
        header("Location: ../cadastro.php?erro=true ");
        exit;
    } else {
        $result_cad = "INSERT INTO UserTable (FullName,user,Acces,Name,sub,perfil) VALUES ('$nome','$email',1,'$givenName','$sub','$image')";
        $resultado_cad = mysqli_query($conn, $result_cad);

        if (mysqli_insert_id($conn)) {

            header("Location: ../cadastro.php");
        } else {
            header("Location: ../cadastro.php ");
        }
        
    }
    
} else {
   
}
die('   problemas ao execultar a api');
exit;
