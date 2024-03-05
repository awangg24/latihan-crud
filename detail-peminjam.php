<?php

include("./vendor/autoload.php");

require_once(__DIR__.'/configurasi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

require_once(__DIR__.'/peminjam.php');

$id = $_GET['id'];
$data = peminjam::find($id);

echo $twig->render('detail-peminjam.twig', ['data' => $data]);