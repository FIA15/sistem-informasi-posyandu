<?php include_once('../_header.php');
require_once "../_config/config.php";?>

<section class="content-header">
    <h1>
        Imunisasi
        <small>Data Imunisasi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Transaksi / Imunisasi</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Imunisasi</h3>
                <div class="pull-right">
                    <a href="<?=base_url('cetak/laporan_imunisasi.php')?>" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
                    <a href="<?=base_url('cetak/excel_imunisasi.php')?>" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Export EXCEL</a>
                    <a href="<?=base_url('imunisasi')?>" class="btn btn-warning btn-flat"><i class="glyphicon glyphicon-triangle-left"></i>Kembali</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
            <div style="position: relative; left:300px">
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" name="dari_tgl"  value="" class="datepicker span2 form-control" id="datepicker" placeholder="Dari Tanggal" >
                                </div>
                            </td>
                            <td>S/D</td>
                            <td>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" name="sampai_tgl"  value="" class="datepicker span2 form-control" id="datepicker" placeholder="Sampai Tanggal" >
                                </div>
                            </td>
                            <td style="position: relative; left: 10px;"><button type="submit" name="filter" class="btn btn-danger btn-sm"><i class="fa fa-search "></i> Filter</button></td>
                            <td style="position: relative; left: 10px;"><button type="submit" name="cetak" class="btn btn-danger btn-sm"><i class="fa fa-print "></i> Cetak</button></td>
                        </tr>
                    </table>
                </form>
               <div style="position: relative; left:130px">
               <?php
                    if(isset($_POST['filter'])) {
                    $dari = mysqli_real_escape_string($con, @$_POST['dari_tgl']);
                    $sampai = mysqli_real_escape_string($con, @$_POST['sampai_tgl']);
                    echo "$dari"." Sampai "."$sampai";
                    }
                ?>
                </div>
            </div>
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                        <th>NO.</th>
                        <th>Id Imunisasi</th>
                        <th>Nama Anak</th>
                        <th>Nama Ibu</th>
                        <th>Vitamin</th>
                        <th>Tanggal Imunisasi</th>
                        <th>Saran</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                if(isset($_POST['filter'])) {
                    $dari = mysqli_real_escape_string($con, @$_POST['dari_tgl']);
                    $sampai = mysqli_real_escape_string($con, @$_POST['sampai_tgl']);
                    $query = "SELECT * FROM imunisasi 
                            INNER JOIN vitamin on imunisasi.id_vitamin = vitamin.id_vitamin
                            INNER JOIN ibu on imunisasi.nik = ibu.nik
                            INNER JOIN pegawai on imunisasi.nip = pegawai.nip
                            INNER JOIN anak on imunisasi.nik_anak = anak.nik_anak
                            WHERE tanggal BETWEEN '$dari' AND '$sampai'
                            ";
                    $sql_ibu = mysqli_query($con,$query) or die (mysqli_error($con));
                } else {
                    $query = "SELECT * FROM imunisasi 
                    INNER JOIN vitamin on imunisasi.id_vitamin = vitamin.id_vitamin
                    INNER JOIN ibu on imunisasi.nik = ibu.nik
                    INNER JOIN pegawai on imunisasi.nip = pegawai.nip
                    INNER JOIN anak on imunisasi.nik_anak = anak.nik_anak
                ";
                $sql_ibu = mysqli_query($con,$query) or die (mysqli_error($con));
                }
                if(mysqli_num_rows($sql_ibu) > 0){
                    while($data = mysqli_fetch_array($sql_ibu)){?>
                        <tr>
                        <td style="width: 5%;"><?=$no++?></td>
                        <td><?=$data['id_imunisasi']?></td>
                        <td><?=$data['nama_anak']?></td>
                        <td><?=$data['nama_ibu']?></td>
                        <td><?=$data['nama_vitamin']?></td>
                        <td><?=$data['tanggal']?></td>
                        <td><?=$data['saran']?></td>
                        </tr>
                    <?php
                    }
                }else{
                    echo "<tr><td colspan=\"6\" align=\"center\">Data Tidak Di Temukan</td></tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
</section>

<?php include_once('../_footer.php');?>