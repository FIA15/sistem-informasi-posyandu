<?php include_once('../_header.php');?>

<section class="content-header">
    <h1>
        Ibu
        <small>Data Ibu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Transaksi / Ibu</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Ibu</h3>
                <div class="pull-right">
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Tambah</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead  >
                    <tr>
                        <th>NO.</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No.Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql_ibu = mysqli_query($con,"SELECT * FROM ibu") or die (mysqli_error($con));
                if(mysqli_num_rows($sql_ibu) > 0){
                    while($data = mysqli_fetch_array($sql_ibu)){?>
                        <tr>
                        <td style="width: 5%;"><?=$no++?></td>
                        <td><?=$data['nik']?></td>
                        <td><?=$data['nama_ibu']?></td>
                        <td><?=$data['tempatlahir']?>,<?=$data['tgllahir']?></td>
                        <td><?=$data['alamat']?></td>
                        <td><?=$data['notelp']?></td>
                        <td class="text-center" width="160px">    
                            <a href="edit.php?id=<?=$data['nik']?>"  class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <a href="del.php?id=<?=$data['nik']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs">
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