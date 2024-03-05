<?php

include("./vendor/autoload.php");

require_once(__DIR__.'/configurasi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);


require_once(__DIR__.'/peminjam.php');

$data = peminjam::all();


echo $twig->render('peminjam-tampil.twig', ['data' => $data]);