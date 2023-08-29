<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pegawai
        <small>Edit Data Pegawai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Master / Pegawai / Edit Pegawai  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Pegawai</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Kembali</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php
                    $id = @$_GET['id'];
                    $sql_desa = mysqli_query($con,"SELECT * FROM pegawai WHERE nip = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_desa);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>NIP *</label><small>
                            <input type="text" name="nip" value="<?=$data['nip']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="nama" id="nama" value="<?=$data['nama']?>" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label >Tempat Lahir *</label>
                            <input type="text" name="tempatlahir"  value="<?=$data['tempatlahir']?>" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tgl_lahir"  value="<?=$data['tgl_lahir']?>" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" id="" class="form-control"required><?=$data['alamat']?></textarea>
                        </div>
                        <div class="form-group">
                            <label>No Telp *</label>
                            <input type="text" name="notelp"  value="<?=$data['notelp']?>" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="text" name="email"  value="<?=$data['email']?>" class="form-control"  required>
                        </div>
                        <div class="form-group ">
                                <label>Hak Akses *</label>
                                <select name="status" class="form-control" required>
                                    <option value="">- PILIH -</option>
                                        <option value="Kader" <?=$data['status'] == 'Kader' ? "selected" : null?>>Kader</option>
                                        <option value="Perawat" <?=$data['status'] == 'Perawat' ? "selected" : null?>>Perawat</option>
                                        <option value="Bidan" <?=$data['status'] == 'Bidan' ? "selected" : null?>>Bidan</option>
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

<?php include_once('../_footer.php');?>