<?php

$id = $_GET['id'];

include("./vendor/autoload.php");
require_once(__DIR__.'/configurasi.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templateku');
$twig = new \Twig\Environment($loader);
require_once(__DIR__.'/anggota.php');
$data = anggota::find($id);

echo $twig->render('form-teori-edit.twig', ['data' => $data]);