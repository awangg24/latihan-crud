<?php

include("./vendor/autoload.php");

use Rakit\Validation\Validator;

require_once(__DIR__.'/koneksi.php');

require_once(__DIR__.'/buku.php');

$id = $_GET['id'];

$validator = new Validator();

// make it
$validation = $validator->make($_POST, $_FILES,[
    'judul_buku'  => "required",
    'pengarang'  => "required",
    'penerbit'  => "required",
    'tahun_terbit'  => "required",
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

    $judul_buku    = $_POST['judul_buku'];
    $pengarang     = $_POST['pengarang'];
    $penerbit      = $_POST['penerbit'];
    $tahun_terbit  = $_POST['tahun_terbit'];

    echo "Success di update!", "<br>";

    echo "judul_buku ", $judul_buku, "<br>";
    echo "pengarang ", $pengarang, "<br>";
    echo "penerbit ", $penerbit, "<br>";
    echo "tahun_terbit ", $tahun_terbit;



    $data = buku::find($id);
    $data->judul_buku = $judul_buku;
    $data->pengarang = $pengarang;
    $data->penerbit = $penerbit;
    $data->tahun_terbit = $tahun_terbit;
    $data->save();
    


    echo "<p>Klik <a href='tampil-buku.php'>disini</a> untuk melihat daftar";

}



?>