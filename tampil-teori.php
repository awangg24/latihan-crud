<?php



include("./vendor/autoload.php");

require_once(__DIR__.'/configurasi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);


require_once(__DIR__.'/anggota.php');

$data = anggota::all();


echo $twig->render('teori-tampil.twig', ['data' => $data]);