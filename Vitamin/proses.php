<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['id_vitamin']));
    $cekid = mysqli_query($con,"SELECT * FROM vitamin WHERE id_vitamin = '$id'") or die (mysqli_error($con));
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_vitamin']));
    $ceknama = mysqli_query($con,"SELECT * FROM vitamin WHERE nama_vitamin = '$nama'") or die (mysqli_error($con));
    
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID VITAMIN $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('NAMA VITAMIN $nama Sudah Terdaftar!');window.location='add.php';</script>";
    } else{
        mysqli_query($con, "INSERT INTO vitamin (id_vitamin, nama_vitamin) VALUES ('$id', '$nama')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['id_vitamin'];
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_vitamin']));
    mysqli_query($con, "UPDATE vitamin SET id_vitamin = '$id', nama_vitamin = '$nama' WHERE id_vitamin = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

?>