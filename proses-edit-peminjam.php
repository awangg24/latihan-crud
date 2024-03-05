<?php

include("./vendor/autoload.php");

use Rakit\Validation\Validator;

require_once(__DIR__.'/configurasi.php');

require_once(__DIR__.'/peminjam.php');

$id = $_GET['id'];

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
    

    echo "Success di update!", "<br>";

    echo "kode_peminjam ", $kode_peminjam, "<br>";
    echo "kode_anggota ", $kode_anggota, "<br>";
    echo "kode_petugas ", $kode_petugas, "<br>";


    $data = peminjam::find($id);
    $data->kode_peminjam = $kode_peminjam;
    $data->kode_anggota = $kode_anggota;
    $data->kode_petugas = $kode_petugas;
    $data->save();
    


    echo "<p>Klik <a href='tampil-peminjam.php'>disini</a> untuk melihat daftar";

}



?>