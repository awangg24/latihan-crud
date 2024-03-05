<?php

include("./vendor/autoload.php");

require_once(__DIR__.'/koneksi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);


require_once(__DIR__.'/detail_pinjam.php');

$data = detail_pinjam::all();


echo $twig->render('pinjam-tampil.twig', ['data' => $data]);