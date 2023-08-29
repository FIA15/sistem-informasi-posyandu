<?php
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['nik_anak']));
        $cekid = mysqli_query($con,"SELECT * FROM anak WHERE nik_anak = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_anak']));
    $nik = trim(mysqli_real_escape_string($con, @$_POST['nik']));
    $tl = trim(mysqli_real_escape_string($con, @$_POST['tempat']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgllahir']));
    $umur = trim(mysqli_real_escape_string($con, @$_POST['umur']));
    $berat = trim(mysqli_real_escape_string($con, @$_POST['berat']));
    $tinggi = trim(mysqli_real_escape_string($con, @$_POST['tinggi']));
    $jeniskelamin = trim(mysqli_real_escape_string($con, @$_POST['jeniskelamin']));
    $komen = trim(mysqli_real_escape_string($con, @$_POST['komen']));
        
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('GAGAL!! NIK ANAK $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO 
        anak (nik_anak, nama_anak, nik, tempat, tgllahir, umur, berat, tinggi, jeniskelamin, komen ) 
        VALUES  ('$id','$nama','$nik','$tl','$tanggal','$umur','$berat','$tinggi','$jeniskelamin','$komen')") 
        or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = @$_POST['nik_anak'];
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_anak']));
    $tl = trim(mysqli_real_escape_string($con, @$_POST['tempat']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgllahir']));
    $umur = trim(mysqli_real_escape_string($con, @$_POST['umur']));
    $berat = trim(mysqli_real_escape_string($con, @$_POST['berat']));
    $tinggi = trim(mysqli_real_escape_string($con, @$_POST['tinggi']));
    $jeniskelamin = trim(mysqli_real_escape_string($con, @$_POST['jeniskelamin']));
    $komen = trim(mysqli_real_escape_string($con, @$_POST['komen']));
    mysqli_query($con, "UPDATE anak SET 
                    nik_anak    = '$id', 
                    nama_anak   = '$nama',
                    tempat      = '$tl', 
                    tgllahir    = '$tanggal',
                    umur        = '$umur',
                    berat       = '$berat',
                    tinggi      = '$tinggi',
                    jeniskelamin= '$jeniskelamin',
                    komen       = '$komen'
                    WHERE nik_anak   = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

?>