<?php
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['id_imunisasi']));
        $cekid = mysqli_query($con,"SELECT * FROM imunisasi WHERE id_imunisasi = '$id'") or die (mysqli_error($con)); 
    $nik = trim(mysqli_real_escape_string($con, @$_POST['nik']));
    $nik_anak = trim(mysqli_real_escape_string($con, @$_POST['nik_anak']));
        $ceknikanak = mysqli_query($con,"SELECT * FROM imunisasi WHERE nik_anak = '$nik_anak'") or die (mysqli_error($con));
    $id_vitamin = trim(mysqli_real_escape_string($con, @$_POST['id_vitamin']));
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tanggal']));
    $saran = trim(mysqli_real_escape_string($con, @$_POST['saran']));
//    echo var_dump($id,$nik,$nik_anak,$id_vitamin,$nip,$tanggal,$saran);
    if(mysqli_num_rows($ceknikanak) > 0){
        echo "<script>alert('GAGAL!! NIK Anak $nik_anak Sudah Terdaftar!');window.location='add.php';</script>";
    } else if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('GAGAL!! ID IMUNISASI  $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else  {
        mysqli_query($con, "INSERT INTO 
        imunisasi (id_imunisasi, nik, nik_anak, id_vitamin, nip, tanggal, saran ) 
        VALUES      ('$id','$nik','$nik_anak','$id_vitamin','$nip','$tanggal','$saran')") 
        or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = @$_POST['id_imunisasi'];
    $nik = trim(mysqli_real_escape_string($con, @$_POST['nik']));
    $nik_anak = trim(mysqli_real_escape_string($con, @$_POST['nik_anak']));
    $id_vitamin = trim(mysqli_real_escape_string($con, @$_POST['id_vitamin']));
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tanggal']));
    $saran = trim(mysqli_real_escape_string($con, @$_POST['saran']));
    mysqli_query($con, "UPDATE imunisasi SET 
                    id_imunisasi    = '$id', 
                    nik   = '$nik',
                    nik_anak   = '$nik_anak',
                    id_vitamin      = '$id_vitamin', 
                    nip    = '$nip',
                    tanggal        = '$tanggal',
                    saran       = '$saran'
                    WHERE id_imunisasi   = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

?>