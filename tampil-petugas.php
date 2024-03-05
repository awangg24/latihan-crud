<?php

include("./vendor/autoload.php");

require_once(__DIR__.'/configurasi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);


require_once(__DIR__.'/petugas.php');

$data = petugas::all();


echo $twig->render('petugas-tampil.twig', ['data' => $data]);