<?php
    include './config.php';
    
    $nopol = $_GET['nopol'];
    
    $result = mysqli_query($mysqli, "select id from M_PENGGUNA where nopol = '$nopol'");
    $num = mysqli_num_rows($result);
    
    if($num == 1){
        $jabar = mysqli_fetch_array($result);
        
        $last = date("Y-m-d H:i:s");
        $id_pengguna = $jabar['id'];
        
        $sql = mysqli_query($mysqli, "insert into M_HISTORY (id_pengguna, last_seen) values ('$id_pengguna', '$last')");
        
        if($sql != FALSE){
            echo "Last Seen is Record";
        }else{
            echo "Last Seen not Record";
        }
    }