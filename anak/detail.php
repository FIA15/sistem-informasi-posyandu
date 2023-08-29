<?php include_once('../_header.php');?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Anak
        <small>Detail Data Anak</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Transaksi / Anak / Detail Anak  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Data Anak</h3>
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
                    $sql_anak = mysqli_query($con,"SELECT * FROM anak WHERE nik_anak = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_anak);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>NIK Anak*</label><small>
                            <input type="text" name="nik_anak" value="<?=$data['nik_anak']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Anak*</label>
                            <input type="text" name="nama_anak" id="nama" value="<?=$data['nama_anak']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Ibu*</label>
                            <select name="nip" class="form-control" id="" disabled>
                                <?php
                                    $sql_nama = mysqli_query($con, "SELECT * FROM ibu ") OR DIE (mysqli_error($con));
                                    while($data_ibu = mysqli_fetch_array($sql_nama)){
                                    if($data_ibu['nik'] == $data['nik']){
                                    ?>
                                    <option value="<?=$data_ibu['nik']?>" selected="selected" ><?=$data_ibu['nik']?> - <?=$data_ibu['nama_ibu']?> </option> 
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
                            <label >Tempat Lahir *</label>
                            <input type="text" name="tempat"  value="<?=$data['tempat']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tgllahir"  value="<?=$data['tgllahir']?>" class="datepicker span2 form-control" id="datepicker" disabled>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 col-md-offset-1">  
                        <div class="form-group">
                            <label >Umur *</label>
                            <input type="text" name="umur"  value="<?=$data['umur']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Berat *</label>
                            <input type="text" name="berat"  value="<?=$data['berat']?>" class="form-control"  readonly>
                        </div>
                        <div class="form-group">
                            <label>Tinggi *</label>
                            <input type="text" name="tinggi"  value="<?=$data['tinggi']?>" class="form-control"  readonly>
                        </div>
                        <div class="form-group">
                                <label>Jenis Kelamin *</label>
                                <select name="jeniskelamin" class="form-control" disabled>
                                    <option value="">- PILIH -</option>
                                    <option value="Laki-Laki" <?= $data['jeniskelamin'] == 'Laki-Laki' ? "selected" : "disabled"?>>Laki-Laki</option>
                                    <option value="Perempuan"  <?= $data['jeniskelamin'] == 'Perempuan' ? "selected" : "disabled"?>>Perempuan</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Komentar </label>
                            <input type="text" name="komen"  value="<?=$data['komen']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="edit.php?id=<?=$data['nik_anak']?>"  class="btn btn-primary btn-xl">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>
<?php include_once('../_footer.php');?>