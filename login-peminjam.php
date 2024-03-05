<?php

include("./vendor/autoload.php");

use Rakit\Validation\Validator;

require_once(__DIR__.'/configurasi.php');

require_once(__DIR__.'/peminjam.php');


$validator = new Validator();

// make it
$validation = $validator->make($_POST, $_FILES,[
    'kode_peminjam'  => "required",
    'kode_anggota'  => "required",
    'kode_petugas'  => "required",
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

    $kode_peminjam = $_POST['kode_peminjam'];
    $kode_anggota  = $_POST['kode_anggota'];
    $kode_petugas  = $_POST['kode_petugas'];

    

    echo "Success!", "<br>";

    echo "kode_peminjam ", $kode_peminjam, "<br>";
    echo "kode_anggota ", $kode_anggota, "<br>";
    echo "kode_petugas ", $kode_petugas, "<br>";




    $peminjam = new peminjam();
    $peminjam->kode_peminjam = $kode_peminjam;
    $peminjam->kode_anggota = $kode_anggota;
    $peminjam->kode_petugas = $kode_petugas;
    $peminjam->save();


    echo "<p>Klik <a href='tampil-peminjam.php'>disini</a> untuk melihat daftar";

}



?>