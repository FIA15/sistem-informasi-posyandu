<?php include_once('../_header.php');?>

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
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Tambah</a>
                    <a href="../cetak/excel_imunisasi.php" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak</a>
                    </div>
            </div>   
            <div class="box-body table-responsive">
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM imunisasi 
                            INNER JOIN vitamin on imunisasi.id_vitamin = vitamin.id_vitamin
                            INNER JOIN ibu on imunisasi.nik = ibu.nik
                            INNER JOIN pegawai on imunisasi.nip = pegawai.nip
                            INNER JOIN anak on imunisasi.nik_anak = anak.nik_anak
                        ";
                $sql_ibu = mysqli_query($con,$query) or die (mysqli_error($con));
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
                        <td class="text-center" width="160px">    
                            <a href="detail.php?id=<?=$data['id_imunisasi']?>"  class="btn btn-warning btn-xs">
                                <i class="fa fa-eye"></i> Detail
                            </a>
                            <a href="edit.php?id=<?=$data['id_imunisasi']?>"  class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <a href="del.php?id=<?=$data['id_imunisasi']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Hapus  
                            </a>
                        </td>
                        </tr>
                    <?php
                    }
                }else{
                    echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak Di Temukan</td></tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
</section>

<?php include_once('../_footer.php');?>