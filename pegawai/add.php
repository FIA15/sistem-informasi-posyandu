<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pegawai
        <small>Tambah Data Pegawai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Master / Pegawai / Tambah Pegawai  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Pegawai</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Kembali</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>NIP *</label><small>
                            <input type="text" name="nip" value="" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="nama" id="nama" value="" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label >Tempat Lahir *</label>
                            <input type="text" name="tempatlahir"  value="" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tgl_lahir"  value="" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" id="" class="form-control"required></textarea>
                        </div>
                        <div class="form-group">
                            <label>No Telp *</label>
                            <input type="number" name="notelp"  value="" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email"  value="" class="form-control"  required>
                        </div>
                        <div class="form-group ">
                                <label>Status Pegawai *</label>
                                <select name="status" class="form-control" required>
                                    <option value="">- PILIH -</option>
                                    <option value="Kader">Kader</option>
                                    <option value="Perawat">Perawat</option>
                                    <option value="Bidan">Bidan</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add" class="btn btn-success"><i class="fa fa-paper-plane "></i> Simpan</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>
<?php include_once('../_footer.php');?>