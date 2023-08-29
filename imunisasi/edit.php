<?php include_once('../_header.php');?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Imunisasi
        <small>Edit Data Imunisasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Transaksi / Imunisasi / Edit Imunisasi  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Data Imunisasi</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Kembali</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                <?php
                    $id = @$_GET['id'];
                    $sql_imunisasi = mysqli_query($con,"SELECT * FROM imunisasi WHERE id_imunisasi = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_imunisasi);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>ID Imunisasi*</label>    
                            <input type="text" name="id_imunisasi" value="<?=$data['id_imunisasi']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Anak *</label>
                            <select name="nik_anak" class="form-control" id="" readonly>
                                <?php
                                    $sql_nama = mysqli_query($con, "SELECT * FROM anak ") OR DIE (mysqli_error($con));
                                    while($data_anak = mysqli_fetch_array($sql_nama)){
                                    if($data_anak['nik_anak'] == $data['nik_anak']){
                                    ?>
                                    <option value="<?=$data_anak['nik_anak']?>" selected="selected" ><?=$data_anak['nama_anak']?> </option> 
                                    <?php
                                        }else{																	
                                    ?>
                                    <option disabled value="<?=$data_anak['nik_anak']?>"><?=$data_anak['nama_anak']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ibu *</label>
                            <select name="nik" class="form-control" id="" readonly>
                                <?php
                                    $sql_nama = mysqli_query($con, "SELECT * FROM ibu ") OR DIE (mysqli_error($con));
                                    while($data_ibu = mysqli_fetch_array($sql_nama)){
                                    if($data_ibu['nik'] == $data['nik']){
                                    ?>
                                    <option value="<?=$data_ibu['nik']?>" selected="selected" ><?=$data_ibu['nama_ibu']?> </option> 
                                    <?php
                                        }else{																	
                                    ?>
                                    <option disabled value="<?=$data_ibu['nik']?>"><?=$data_ibu['nama_ibu']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Petugas *</label>
                            <select name="nip" class="form-control" id="" required>
                                <?php
                                    $sql_nama = mysqli_query($con, "SELECT * FROM pegawai WHERE status = 'Perawat' OR status = 'Bidan' ") OR DIE (mysqli_error($con));
                                    while($data_petugas = mysqli_fetch_array($sql_nama)){
                                    if($data_petugas['nip'] == $data['nip']){
                                    ?>
                                    <option value="<?=$data_petugas['nip']?>" selected="selected" ><?=$data_petugas['nip']?> - <?=$data_petugas['nama']?> ( <?=$data_petugas['status']?> ) </option> 
                                    <?php
                                        }else{																	
                                    ?>
                                    <option  value="<?=$data_petugas['nip']?>"><?=$data_petugas['nip']?> - <?=$data_petugas['nama']?> ( <?=$data_petugas['status']?> )</option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="col-md-4 col-md-offset-1">  
                        <div class="form-group">
                            <label>Vitamin *</label>
                            <select name="id_vitamin" class="form-control" id="" required>
                                <?php
                                    $sql_nama = mysqli_query($con, "SELECT * FROM vitamin ") OR DIE (mysqli_error($con));
                                    while($data_vitamin = mysqli_fetch_array($sql_nama)){
                                    if($data_vitamin['id_vitamin'] == $data['id_vitamin']){
                                    ?>
                                    <option value="<?=$data_vitamin['id_vitamin']?>" selected="selected" ><?=$data_vitamin['nama_vitamin']?> </option> 
                                    <?php
                                        }else{																	
                                    ?>
                                    <option value="<?=$data_vitamin['id_vitamin']?>"><?=$data_vitamin['nama_vitamin']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Imunisasi *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tanggal"  value="<?=$data['tanggal']?>" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Saran </label>
                            <textarea name="saran" id="" class="form-control" cols="1" rows="2"><?=$data['saran']?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit" class="btn btn-success"><i class="fa fa-paper-plane "></i> Simpan</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>
<?php include_once('../_footer.php');?>