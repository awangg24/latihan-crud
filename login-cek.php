<?php
session_start();

include("./vendor/autoload.php");
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

$username =$_POST['username'];
$password =$_POST['password'];

if ($username == "awang" && password == "awang") {

    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;

} else {


    echo $twig->render('form-login.twig');
}


?>