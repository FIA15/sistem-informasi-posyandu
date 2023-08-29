<?php
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $id = $id = trim(mysqli_real_escape_string($con, @$_POST['nip']));
        $cekid = mysqli_query($con,"SELECT * FROM pegawai WHERE nip = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama']));
    $tl = trim(mysqli_real_escape_string($con, @$_POST['tempatlahir']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgl_lahir']));
    $alamat = trim(mysqli_real_escape_string($con, @$_POST['alamat']));
    $notelp = trim(mysqli_real_escape_string($con, @$_POST['notelp']));
        $ceknotelp = mysqli_query($con,"SELECT * FROM pegawai WHERE notelp = '$notelp'") or die (mysqli_error($con));
    $email = trim(mysqli_real_escape_string($con, @$_POST['email']));
        $cekemail = mysqli_query($con,"SELECT * FROM pegawai WHERE email = '$email'") or die (mysqli_error($con));
    $status = trim(mysqli_real_escape_string($con, @$_POST['status']));

    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('GAGAL!! NIP $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else if(mysqli_num_rows($ceknotelp) > 0){
        echo "<script>alert('GAGAL!! No Telepon $notelp Sudah Terdaftar!');window.location='add.php';</script>";
    } else if(mysqli_num_rows($cekemail) > 0){
        echo "<script>alert('GAGAL!! Email $email Sudah Terdaftar!');window.location='add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO 
        pegawai (nip, nama, tempatlahir, tgl_lahir, alamat, notelp, email, status ) 
        VALUES  ('$id','$nama','$tl','$tanggal','$alamat','$notelp','$email','$status')") 
        or die(mysqli_error($con));
        echo "<script>window.location='data.php';</script>"; 
    }
} else if(isset($_POST['edit'])) {
    $id = @$_POST['nip'];
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama']));
    $tl = trim(mysqli_real_escape_string($con, @$_POST['tempatlahir']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgl_lahir']));
    $alamat = trim(mysqli_real_escape_string($con, @$_POST['alamat']));
    $notelp = trim(mysqli_real_escape_string($con, @$_POST['notelp']));
    $email = trim(mysqli_real_escape_string($con, @$_POST['email']));
    $status = trim(mysqli_real_escape_string($con, @$_POST['status']));
    mysqli_query($con, "UPDATE pegawai SET 
                    nip         = '$id', 
                    nama        = '$nama', 
                    tempatlahir = '$tl', 
                    tgl_lahir   = '$tanggal', 
                    alamat      = '$alamat', 
                    notelp      = '$notelp', 
                    email       = '$email',
                    status       = '$status'
                    WHERE nip   = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

?>