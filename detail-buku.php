<?php

include("./vendor/autoload.php");

require_once(__DIR__.'/koneksi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

require_once(__DIR__.'/buku.php');

$id = $_GET['id'];
$data = buku::find($id);

echo $twig->render('detail-buku.twig', ['data' => $data]);