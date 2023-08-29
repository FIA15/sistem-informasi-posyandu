<?php include_once('../_header.php');?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Anak
        <small>Tambah Data Anak</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Transaksi / Anak / Tambah Anak  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Anak</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Kembali</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>NIK Anak*</label><small>
                            <input type="text" name="nik_anak" value="" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Nama Anak*</label>
                            <input type="text" name="nama_anak" id="nama" value="" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label>Ibu *</label>
                            <select name="nik" class="form-control" id="">
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_ibu = mysqli_query($con, "SELECT * FROM ibu ") OR DIE (mysqli_error($con));
                                    while($data_ibu = mysqli_fetch_array($sql_ibu)){
                                        echo '<option value="'.$data_ibu['nik'].'">'.$data_ibu['nik'].' - '.$data_ibu['nama_ibu'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Tempat Lahir *</label>
                            <input type="text" name="tempat"  value="" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tgllahir"  value="" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 col-md-offset-1">  
                        <div class="form-group">
                            <label >Umur *</label>
                            <input type="text" name="umur"  value="" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label>Berat *</label>
                            <input type="text" name="berat"  value="" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label>Tinggi *</label>
                            <input type="text" name="tinggi"  value="" class="form-control"  required>
                        </div>
                        <div class="form-group">
                                <label>Jenis Kelamin *</label>
                                <select name="jeniskelamin" class="form-control" required>
                                    <option value="">- PILIH -</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Komentar </label>
                            <input type="text" name="komen"  value="" class="form-control">
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