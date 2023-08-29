<?php include_once('../_header.php');?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Imunisasi
        <small>Tambah Data Imunisasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Transaksi / Imunisasi / Tambah Imunisasi  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Imunisasi</h3>
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
                            <label>ID Imunisasi*</label>    
                            <?php
                                $query = mysqli_query($con, "SELECT max(id_imunisasi) as kodeTerbesar FROM imunisasi") or die (mysqli_error($con));
                                $data = mysqli_fetch_array($query);
                                $kodeImunisasi = $data['kodeTerbesar'];
                                $urutan = (int) substr($kodeImunisasi, 5, 3);
                                $urutan++;
                                $huruf = "CBT";
                                $kodeImunisasi = $huruf.'-'.sprintf("%03s", $urutan).'/'.$nip.'/'.date('dmy');
                            ?>
                            <input type="text" name="id_imunisasi" value="<?=$kodeImunisasi?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Anak *</label>
                            <select name="nik_anak" class="form-control" id="" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_anak = mysqli_query($con, "SELECT * FROM anak ") OR DIE (mysqli_error($con));
                                    while($data_anak = mysqli_fetch_array($sql_anak)){
                                        echo '<option value="'.$data_anak['nik_anak'].'">'.$data_anak['nik_anak'].' - '.$data_anak['nama_anak'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ibu *</label>
                            <select name="nik" class="form-control" id="" required>
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
                            <label>Petugas *</label>
                            <select name="nip" class="form-control" id="" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_petugas = mysqli_query($con, "SELECT * FROM pegawai WHERE status = 'Perawat' OR status = 'Bidan' ") OR DIE (mysqli_error($con));
                                    while($data_petugas = mysqli_fetch_array($sql_petugas)){
                                        echo '<option value="'.$data_petugas['nip'].'">'.$data_petugas['nip'].' - '.$data_petugas['nama'].' ( '.$data_petugas['status'].' )</option>';
                                    }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="col-md-4 col-md-offset-1">  
                        <div class="form-group">
                            <label>Vitamin *</label>
                            <select name="id_vitamin" class="form-control" id="" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_vitamin = mysqli_query($con, "SELECT * FROM vitamin ") OR DIE (mysqli_error($con));
                                    while($data_vitamin = mysqli_fetch_array($sql_vitamin)){
                                        echo '<option value="'.$data_vitamin['id_vitamin'].'">'.$data_vitamin['id_vitamin'].' - '.$data_vitamin['nama_vitamin'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Vitamin *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tanggal"  value="<?=date('Y-m-d')?>" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Saran </label>
                            <textarea name="saran" id="" class="form-control" cols="1" rows="2"></textarea>
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