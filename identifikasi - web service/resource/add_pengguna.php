<?php
    include './config.php';
    
    $id = uniqid("PENGGUNA_");
    $nopol = $_POST['nopol'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $foto_name = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    
    if(move_uploaded_file($foto_tmp, "../utilitas/img/".$foto_name) == TRUE){
        $result = mysqli_query($mysqli, "insert into M_PENGGUNA (id, nopol, nama, email, foto) values ('$id', '$nopol', '$nama', '$email', '$foto_name')");
        
        echo "<script>alert('Pengguna berhasil ditambahkan !!!');window.location = '../pengguna.php'</script>";
    }
    