<?php

include("./vendor/autoload.php");

use Rakit\Validation\Validator;

require_once(__DIR__.'/configurasi.php');

require_once(__DIR__.'/detail_pinjam.php');

$id = $_GET['id'];

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
    

    echo "Success di update!", "<br>";

    echo "kode_register ", $kode_register, "<br>";
    echo "kode_pinjam ", $kode_pinjam, "<br>";
    echo "tgl_pinjam ", $tgl_pinjam, "<br>";
    echo "tgl_kembali ", $tgl_kembali;



    $data = detail_pinjam::find($id);
    $data->kode_register = $kode_register;
    $data->kode_pinjam = $kode_pinjam;
    $data->tgl_pinjam = $tgl_pinjam;
    $data->tgl_kembali = $tgl_kembali;
    $data->save();
    


    echo "<p>Klik <a href='tampil-pinjam.php'>disini</a> untuk melihat daftar";

}



?>