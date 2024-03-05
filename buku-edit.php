<?php

$id = $_GET['id'];

include("./vendor/autoload.php");
require_once(__DIR__.'/configurasi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);
require_once(__DIR__.'/buku.php');
$data = buku::find($id);


echo $twig->render('form-buku-edit.twig', ['data' => $data]);