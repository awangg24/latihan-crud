<?php
include("./vendor/autoload.php");

require_once(__DIR__.'/koneksi.php');
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

require_once(__DIR__.'/buku.php');

$id = $_GET['id'];     // mengambil id yang dihapus
buku::destroy($id); //perintah untuk menghapus data

echo $twig->render('hapus-buku.twig');