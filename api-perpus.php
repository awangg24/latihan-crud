<?php
header("Content-Type: application/json");
include("./vendor/autoload.php");
require_once(__DIR__.'/configurasi.php');
require_once(__DIR__.'/anggota.php');

$data = Biodata::all();

echo $data;