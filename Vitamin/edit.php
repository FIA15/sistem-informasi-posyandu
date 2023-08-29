<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Vitamin
        <small>Tambah Vitamin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Vitamin / Tambah Vitamin</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Vitamin</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i> Kembali</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php
                    $id = @$_GET['id'];
                    $sql_vitamin = mysqli_query($con,"SELECT * FROM vitamin WHERE id_vitamin = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_vitamin);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>Nama Vitamin *</label>
                            <input type="text" name="id_vitamin" value="<?=$data['id_vitamin']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Vitamin *</label>
                            <input type="text" name="nama_vitamin" value="<?=$data['nama_vitamin']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
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