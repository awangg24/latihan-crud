<?php

include("./vendor/autoload.php");

require_once(__DIR__.'/configurasi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

require_once(__DIR__.'/detail_pinjam.php');

$id = $_GET['id'];
$data = detail_pinjam::find($id);

echo $twig->render('detail-pinjam.twig', ['data' => $data]);