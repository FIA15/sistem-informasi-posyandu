<?php
require_once "../_config/config.php";
require "../_assets/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;
if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
        $ceknip = mysqli_query($con,"SELECT * FROM user WHERE nip = '$nip'") or die (mysqli_error($con)); 
    $username = trim(mysqli_real_escape_string($con, @$_POST['username']));
    $password = trim(mysqli_real_escape_string($con, sha1(@$_POST['password'])));
    $level = trim(mysqli_real_escape_string($con, @$_POST['level']));

    if(mysqli_num_rows($ceknip) > 0){
        echo "<script>alert('GAGAL!! Pegawai Dengan Nip  $nip Sudah Terdaftar!');window.location='add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO user (user_id, username, password, nip, level) 
        VALUES ('$uuid', '$nip', '$password', '$nip', '$level')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
    $desa = trim(mysqli_real_escape_string($con, @$_POST['desa']));
    $username = trim(mysqli_real_escape_string($con, @$_POST['username']));
    $level = trim(mysqli_real_escape_string($con, @$_POST['level']));
    $password = trim(mysqli_real_escape_string($con, sha1(@$_POST['password'])));
    
    $input = "UPDATE user SET  nip = '$nip',   username = '$username', password = '$password', level = '$level' WHERE user_id = '$id'";
    $input2 = "UPDATE user SET  nip = '$nip',   username = '$username', level = '$level' WHERE user_id = '$id'";
    if(!empty($_POST['password'])){
        mysqli_query($con, $input ) or die(mysqli_error($con));
    } else {
        mysqli_query($con, $input2 ) or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>";
}
?>