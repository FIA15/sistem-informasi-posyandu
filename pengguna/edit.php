<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pengguna
        <small>Tambah Data Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Master / Pengguna / Tambah Pengguna  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Pengguna</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Back</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php
                    $id = @$_GET['id'];
                    $sql_user = mysqli_query($con,"SELECT * FROM user WHERE user_id = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_user);
                ?>
                    <form action="proses.php" method="POST">
                    <div class="form-group">
                            <label>Nama *</label>
                            <select name="nip" class="form-control" id="" readonly>
                                <?php
                                    $sql_nama = mysqli_query($con, "SELECT * FROM pegawai ") OR DIE (mysqli_error($con));
                                    while($data_pegawai = mysqli_fetch_array($sql_nama)){
                                    if($data_pegawai['nip'] == $data['nip']){
                                    ?>
                                    <option value="<?=$data_pegawai['nip']?>" selected="selected" ><?=$data_pegawai['nama']?> </option> 
                                    <?php
                                        }else{																	
                                    ?>
                                    <option disabled value="<?=$data_pegawai['nip']?>"><?=$data_pegawai['nama']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username *</label>
                            <input type="hidden" name="id" id="id" value="<?=$data['user_id']?>" >
                            <input type="text" name="username" value="<?=$data['username']?>" class="form-control" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Password Baru*</label>
                            <input type="Password" name="password" id="password1" value="" placeholder="Kosongkan Jika Tidak Diganti" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password *</label>
                            <input type="Password" name="password" id="password2" value="" class="form-control" >
                        </div>
                        <div class="form-group ">
                                <label>Hak Akses *</label>
                                <select name="level" class="form-control" required>
                                    <option value="">- PILIH -</option>
                                        <option value="User" <?= $data['level'] == 'User' ? "selected" : null?>>User</option>
                                        <option value="Admin" <?= $data['level'] == 'Admin' ? "selected" : null?>>Admin</option>
                                        
                                </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit" class="btn btn-success"><i class="fa fa-paper-plane "></i> Save</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>
<script type="text/javascript">
window.onload = function () {
document.getElementById("password1").onchange = validatePassword;
document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
document.getElementById("password2").setCustomValidity("Password Tidak Sesuai");
else
document.getElementById("password2").setCustomValidity('');}
</script>
<?php include_once('../_footer.php');?>