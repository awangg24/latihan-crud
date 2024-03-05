<?php
include("./vendor/autoload.php");

require_once(__DIR__.'/configurasi.php');
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

require_once(__DIR__.'/petugas.php');

$id = $_GET['id'];     // mengambil id yang dihapus
petugas::destroy($id); //perintah untuk menghapus data

echo $twig->render('hapus-petugas.twig');