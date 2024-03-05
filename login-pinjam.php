<?php

include("./vendor/autoload.php");

use Rakit\Validation\Validator;

require_once(__DIR__.'/koneksi.php');

require_once(__DIR__.'/detail_pinjam.php');


$validator = new Validator();

// make it
$validation = $validator->make($_POST, $_FILES,[
    'kode_register'  => "required",
    'kode_pinjam'  => "required",
    'tgl_pinjam'  => "required",
    'tgl_kembali'  => "required",
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

    $kode_register  = $_POST['kode_register'];
    $kode_pinjam    = $_POST['kode_pinjam'];
    $tgl_pinjam     = $_POST['tgl_pinjam'];
    $tgl_kembali    = $_POST['tgl_kembali'];
    

    echo "Success!", "<br>";

    echo "kode_register ", $kode_register, "<br>";
    echo "kode_pinjam ", $kode_pinjam, "<br>";
    echo "tgl_pinjam ", $tgl_pinjam, "<br>";
    echo "tgl_kembali ", $tgl_kembali;



    $detail_pinjam = new detail_pinjam ();
    $detail_pinjam->kode_register = $kode_register;
    $detail_pinjam->kode_pinjam = $kode_pinjam;
    $detail_pinjam->tgl_pinjam = $tgl_pinjam;
    $detail_pinjam->tgl_kembali = $tgl_kembali;
    $detail_pinjam->save();


    echo "<p>Klik <a href='tampil-pinjam.php'>disini</a> untuk melihat daftar";

}



?>