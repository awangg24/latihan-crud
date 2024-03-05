<?php

include("./vendor/autoload.php");

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

echo $twig->render('form-login.twig');