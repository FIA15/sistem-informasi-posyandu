<?php
// default timezone
date_default_timezone_set('Asia/Jakarta');
session_start();

// koneksi
$con= mysqli_connect('localhost','root','','posyandu');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

function base_url($url = null){
    $base_url = "http://localhost/posyandu2";
    if($url != null ){
        return $base_url."/".$url;
    }else{
        return $base_url;
    }
}
?>