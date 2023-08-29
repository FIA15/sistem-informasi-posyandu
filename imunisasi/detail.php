<?php include_once('../_header.php');?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Imunisasi
        <small>Detail Data Imunisasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Transaksi / Imunisasi / Detail Imunisasi  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Data Imunisasi</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Kembali</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <center style="position: relative; bottom: 20px;"><h1>DETAIL DATA IMUNISASI</h1></center>
                <div class="col-md-4 col-md-offset-1">
                <?php
                    $id = @$_GET['id'];
                    $sql_imunisasi = mysqli_query($con,"SELECT * FROM Imunisasi WHERE id_imunisasi = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_imunisasi);
                    $sql_anak = mysqli_query($con,"SELECT * FROM anak") or die(mysqli_error($con));
                    $data_anak = mysqli_fetch_array($sql_anak);
                    $sql_ibu = mysqli_query($con,"SELECT * FROM ibu") or die(mysqli_error($con));
                    $data_ibu = mysqli_fetch_array($sql_ibu);
                    $sql_pegawai = mysqli_query($con,"SELECT * FROM pegawai") or die(mysqli_error($con));
                    $data_pegawai = mysqli_fetch_array($sql_pegawai);
                    $sql_vitamin = mysqli_query($con,"SELECT * FROM vitamin") or die(mysqli_error($con));
                    $data_vitamin = mysqli_fetch_array($sql_vitamin);
                ?>
                    <table style="font-size: large;">
                        <tr>
                            <td style="position: relative; right: 3px;">ID Imunisasi</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data['id_imunisasi']?></td>
                        </tr>
                        <tr>
                            <td style="position: relative; right: 3px;">NIK Anak</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data['nik_anak']?></td>
                        </tr>
                        <tr>
                            <td style="position: relative; right: 3px;">Nama Anak</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data_anak['nama_anak']?></td>
                        </tr>
                        <tr>
                            <td style="position: relative; right: 3px;">Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data_anak['tempat']?>,<?=$data_anak['tgllahir']?></td>
                        </tr>
                        <tr>
                            <td style="position: relative; right: 3px;">Usia</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data_anak['umur']?></td>
                        </tr>
                        <tr>
                            <td style="position: relative; right: 3px;">Berat</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data_anak['berat']?></td>
                        </tr>
                        <tr>
                            <td style="position: relative; right: 3px;">Tinggi</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data_anak['tinggi']?></td>
                        </tr>
                        <tr>
                            <td style="position: relative; right: 3px;">Jenis Kelamin</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data_anak['jeniskelamin']?></td>
                        </tr>
                        <tr>
                            <td style="position: relative; right: 3px;">Keterangan</td>
                            <td>:</td>
                            <td style="position: relative; left: 3px;"><?=$data_anak['komen']?></td>
                        </tr>
                        <tr>
                                <td style="position: relative; right: 3px;">Nama Ibu</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data_ibu['nama_ibu']?></td>
                            </tr>
                            <tr>
                                <td style="position: relative; right: 3px;">NIK Ibu</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data['nik']?></td>
                            </tr>
                            <tr>
                                <td style="position: relative; right: 3px;">Alamat</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data_ibu['alamat']?></td>
                            </tr>
                            <tr>
                                <td style="position: relative; right: 3px;">No Telepon</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data_ibu['notelp']?></td>
                            </tr>
                    </table>
                </div>
                <div class="col-md-4 col-md-offset-1">  
                    <table style="font-size: large;">
                            <tr>
                                <td style="position: relative; right: 3px;">Nama Vitamin</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data_vitamin['nama_vitamin']?></td>
                            </tr>
                            <tr>
                                <td style="position: relative; right: 3px;">ID Vitamin</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data_vitamin['id_vitamin']?></td>
                            </tr>
                            <tr>
                                <td style="position: relative; right: 3px;">Petugas</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data_pegawai['nama']?></td>
                            </tr>
                            <tr>
                                <td style="position: relative; right: 3px;">Status Petugas</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data_pegawai['status']?></td>
                            </tr>
                            <tr>
                                <td style="position: relative; right: 3px;">Nomor Telepon Petugas</td>
                                <td>:</td>
                                <td style="position: relative; left: 3px;"><?=$data_pegawai['notelp']?></td>
                            </tr>
                    </table>
                        <div class="form-group" style="position: relative; top: 50px;">
                            <a href="edit.php?id=<?=$data['id_imunisasi']?>"  class="btn btn-primary btn-lg">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <!-- <a href="../cetak/cetak.php?id=<?=$data['id_imunisasi']?>"  class="btn btn-success btn-lg">
                                <i class="fa fa-print"></i> Cetak
                            </a> -->
                        </div>
                </div>
            </div>
        </div>    
    </div>
</section>
<?php include_once('../_footer.php');?>