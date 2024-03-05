<?php

include("./vendor/autoload.php");

use Rakit\Validation\Validator;

require_once(__DIR__.'/configurasi.php');

require_once(__DIR__.'/petugas.php');


$validator = new Validator();

// make it
$validation = $validator->make($_POST, $_FILES,[
    'kodepetugas'  => "required",
    'nama'  => "required",
    'alamat'  => "required",
]);

// then validate
$validation->validate();

if ($validation->fails()) {
    // handling errors
    $errors = $validation->errors();
    echo "<pre>";
    print_r($errors->firstOfAll());
    echo "</pre>";
    exit;
} else {
    // validation passes

    $kodepetugas  = $_POST['kodepetugas'];
    $nama    = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    

    echo "Success!", "<br>";

    echo "kodepetugas ", $kodepetugas, "<br>";
    echo "nama ", $nama, "<br>";
    echo "alamat ", $alamat, "<br>";



    $petugas = new petugas ();
    $petugas->kodepetugas = $kodepetugas;
    $petugas->nama = $nama;
    $petugas->alamat= $alamat;
    $petugas->save();


    echo "<p>Klik <a href='tampil-petugas.php'>disini</a> untuk melihat daftar";

}



?>