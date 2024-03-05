<?php

include("./vendor/autoload.php");

require_once(__DIR__.'/configurasi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);

require_once(__DIR__.'/anggota.php');

$id = $_GET['id'];
$data = anggota::find($id);

echo $twig->render('detail-teori.twig', ['data' => $data]);