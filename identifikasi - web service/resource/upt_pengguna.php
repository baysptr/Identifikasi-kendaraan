<?php

include './config.php';

$id = $_POST['id'];
$nopol = $_POST['nopol'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$status = $_POST['status'];

$old_foto = $_POST['old_foto'];

$new_ft_name = $_FILES['edt_foto']['name'];
$new_ft_tmp = $_FILES['edt_foto']['tmp_name'];

if ($status == '1') {
    unlink("../utilitas/img/" . $old_foto);
    if (move_uploaded_file($new_ft_tmp, "../utilitas/img/" . $new_ft_name)) {
        mysqli_query($mysqli, "update M_PENGGUNA set nopol = '$nopol', nama = '$nama', email = '$email', foto = '$new_ft_name' where id = '$id'");
        echo "<script>alert('Data telah berhasil di ubah');window.location = '../pengguna.php';</script>";
    } else {
        echo "<script>alert('Error Missing, Data gagal dirubah');window.location = '../pengguna.php';</script>";
    }
} else {
    mysqli_query($mysqli, "update M_PENGGUNA set nopol = '$nopol', nama = '$nama', email = '$email' where id = '$id'");
    echo "<script>alert('Data telah berhasil di ubah');window.location = '../pengguna.php';</script>";
}