<?php

include './config.php';

$id = $_GET['id'];
$foto = $_GET['foto'];

if (unlink("../utilitas/img/" . $foto) == TRUE) {
    mysqli_query($mysqli, "delete from M_PENGGUNA where id = '$id'");

    echo "<script>alert('Data Berhasil dihapus');window.location = '../pengguna.php';</script>";
}