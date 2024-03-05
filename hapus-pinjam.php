<?php
include("./vendor/autoload.php");

require_once(__DIR__.'/koneksi.php');
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

require_once(__DIR__.'/detail_pinjam.php');

$id = $_GET['id'];     // mengambil id yang dihapus
detail_pinjam::destroy($id); //perintah untuk menghapus data

echo $twig->render('hapus-pinjam.twig');