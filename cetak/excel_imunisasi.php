<?php
    require_once "../_config/config.php";
    header("Content-type:application/vnd-ms-excel");
    $date = date('dmY');
    $name = 'imunisasi-'.$date;
    header("Content-Disposition: attachment; filename=$name.xls");
?>
<div style="margin-left: 20px; text-align: center;" >
<div style="font-size: 23px;">Data Imunisasi Anak</div>
<div style="font-size: 25px;">Posyandu Desa Cibatu</div>
<div style="font-size: 12px;">Jl. Kp. Bangkuang No.105, Cibatu, Cikarang Sel., Kabupaten Bekasi, Jawa Barat 17530</div>
</div>
<br>
<table border="1">
    <thead >
        <tr>
            <th>NO.</th>
            <th>Id Imunisasi</th>
            <th>NIK Anak</th>
            <th>Nama Anak</th>
            <th>NIK Ibu</th>
            <th>Nama Ibu</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Umur</th>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Vitamin</th>
            <th>Tanggal Imunisasi</th>
            <th>Pegawai</th>
            <th>Saran</th>
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
        while($data = mysqli_fetch_array($sql_ibu)){?>
            <tr>
                <td style="width: 5%;"><?=$no++?></td>
                <td><?=$data['id_imunisasi']?></td>
                <td><?=$data['nik_anak']?></td>
                <td><?=$data['nama_anak']?></td>
                <td><?=$data['nik']?></td>
                <td><?=$data['nama_ibu']?></td>
                <td><?=$data['tempat']?>,<?=$data['tgllahir']?></td>
                <td><?=$data['umur']?></td>
                <td><?=$data['berat']?></td>
                <td><?=$data['tinggi']?></td>
                <td><?=$data['jeniskelamin']?></td>
                <td><?=$data['alamat']?></td>
                <td><?=$data['notelp']?></td>
                <td><?=$data['nama_vitamin']?></td>
                <td><?=$data['tanggal']?></td>
                <td><?=$data['status']?> <?=$data['nama']?></td>
                <td><?=$data['saran']?></td>
            </tr>
        <?php
        }
    ?>
    </tbody>
</table>