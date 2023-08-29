<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Vitamin
        <small>Data Vitamin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Vitamin</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Vitamin</h3>
                <div class="pull-right">
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Tambah</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                    <th>#</th>
                        <th>ID Vitamin</th>
                        <th>Nama Vitamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql_vitamin = mysqli_query($con, "SELECT * FROM vitamin") or die (mysqli_error($con));
                if(mysqli_num_rows($sql_vitamin) > 0){
                    while($data = mysqli_fetch_array($sql_vitamin)){?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['id_vitamin']?></td>
                            <td><?=$data['nama_vitamin']?></td>
                            <td class="text-center" width="160px">    
                                <a href="edit.php?id=<?=$data['id_vitamin']?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Edit  
                                </a>
                                <a href="del.php?id=<?=$data['id_vitamin']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs">
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