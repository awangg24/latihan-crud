<?php

include("./vendor/autoload.php");

use Rakit\Validation\Validator;

require_once(__DIR__.'/configurasi.php');

require_once(__DIR__.'/anggota.php');


$validator = new Validator();

// make it
$validation = $validator->make($_POST, $_FILES,[
    'nama'  => "required",
    'prodi'  => "required",
    'semester'  => "required",
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

    $nama     = $_POST['nama'];
    $prodi    = $_POST['prodi'];
    $semester = $_POST['semester'];
    $alamat   = $_POST['alamat'];
    

    echo "Success!", "<br>";

    echo "nama ", $nama, "<br>";
    echo "prodi ", $prodi, "<br>";
    echo "semester ", $semester, "<br>";
    echo "alamat ", $alamat;



    $anggota = new anggota();
    $anggota ->nama = $nama;
    $anggota ->prodi = $prodi;
    $anggota ->semester = $semester;
    $anggota ->alamat = $alamat;
    $anggota ->save();


    echo "<p>Klik <a href='tampil-teori.php'>disini</a> untuk melihat daftar";

}



?>