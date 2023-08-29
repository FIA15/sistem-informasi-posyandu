<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Pengguna
        <small>Data Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Pengguna</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Pengguna</h3>
                <div class="pull-right">
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Create</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM user 
                            INNER JOIN pegawai on user.nip = pegawai.nip
                        ";
                $sql_user = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_user) > 0){
                    while($data = mysqli_fetch_array($sql_user)){?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['nip']?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['username']?></td>
                            <td><?=$data['level']?></td>
                            <td class="text-center" width="160px">    
                                <a href="edit.php?id=<?=$data['user_id']?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Edit  
                                </a>
                                <a href="del.php?id=<?=$data['user_id']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs">
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