<?php
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $id = $id = trim(mysqli_real_escape_string($con, @$_POST['nik']));
        $cekid = mysqli_query($con,"SELECT * FROM ibu WHERE nik = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_ibu']));
    $tl = trim(mysqli_real_escape_string($con, @$_POST['tempatlahir']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgllahir']));
    $alamat = trim(mysqli_real_escape_string($con, @$_POST['alamat']));
    $notelp = trim(mysqli_real_escape_string($con, @$_POST['notelp']));
        $ceknotelp = mysqli_query($con,"SELECT * FROM ibu WHERE notelp = '$notelp'") or die (mysqli_error($con));

    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('GAGAL!! NIK $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else if(mysqli_num_rows($ceknotelp) > 0){
        echo "<script>alert('GAGAL!! No Telepon $notelp Sudah Terdaftar!');window.location='add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO 
        ibu (nik, nama_ibu, tempatlahir, tgllahir, alamat, notelp ) 
        VALUES  ('$id','$nama','$tl','$tanggal','$alamat','$notelp')") 
        or die(mysqli_error($con));
        echo "<script>window.location='data.php';</script>"; 
    }
} else if(isset($_POST['edit'])) {
    $id = @$_POST['nik'];
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_ibu']));
    $tl = trim(mysqli_real_escape_string($con, @$_POST['tempatlahir']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgllahir']));
    $alamat = trim(mysqli_real_escape_string($con, @$_POST['alamat']));
    $notelp = trim(mysqli_real_escape_string($con, @$_POST['notelp']));
    mysqli_query($con, "UPDATE ibu SET 
                    nik         = '$id', 
                    nama_ibu    = '$nama', 
                    tempatlahir = '$tl', 
                    tgllahir   = '$tanggal', 
                    alamat      = '$alamat', 
                    notelp      = '$notelp'
                    WHERE nik   = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

?>