<?php
require_once "../_config/config.php";
// include_once('../_header.php');
require "../_assets/vendor/autoload.php";

// // reference the Dompdf namespace
// use Dompdf\Dompdf;

// // instantiate and use the dompdf class
// $dompdf = new Dompdf();
// $html = '
//     <img src="../uploads/img/logokrw.png" style="float: left; width: 50px;">
// <div style="margin-left: 20px; text-align: center;" >
// <div style="font-size: 18px;">Data Pengajuan Alat Disabilitas</div>
// <div style="font-size: 20px;">DINAS SOSIAL KABUPATEN KARAWANG</div>
// <div style="font-size: 12px;">Jl. Husni Hamid No.3, Nagasari, Kec.Karawang Barat, Kabupaten Karawang, Jawa Barat 41312</div>
// </div>
// <br>
// <hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">';
//                     $id = @$_GET['id'];
//                     $sql_pengajuan = mysqli_query($con,"SELECT * FROM pengajuan WHERE id_pengajuan = '$id' ") or die(mysqli_error($con));
//                     $data = mysqli_fetch_array($sql_pengajuan);
// $html .='
// <table>
//         <tr>
//             <td>No Pengajuan</td>
//             <td>:</td>
//             <td>&emsp;'.$data['id_pengajuan'].'</td>
//         </tr>
//         <tr>
//             <td>Tanggal</td>
//             <td>:</td>
//             <td>&emsp;'.date('d F Y').'</td>
//         </tr>
// </table>
//     <div>
//         <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//             Yang mengajukan di bawah ini :
//         </p>
//     </div>
//         <table style="position: relative; left:80px;">
//             <tr>';
//                 $sql_client = mysqli_query($con,"SELECT * FROM client") or die(mysqli_error($con));
//                 $data_client = mysqli_fetch_array($sql_client);
// $html .='
//                 <td>Nama</td>
//                 <td>:</td>
//                 <td>&emsp;'.$data_client['nama_client'].'</td>
//             </tr>
//             <tr>
//                 <td>NIK</td>
//                 <td>:</td>
//                 <td>&emsp;'.$data['nik_p'].'</td>
//             </tr>
//             <tr>
//                 <td>Alamat</td>
//                 <td>:</td>
//                 <td>&emsp;'.$data_client['alamat'].'</td>
//             </tr>
//             <tr>';
//                 $sql_desa = mysqli_query($con,"SELECT * FROM desa") or die(mysqli_error($con));
//                 $data_desa = mysqli_fetch_array($sql_desa);
// $html .='
//                 <td>Desa / Kelurahan</td>
//                 <td>:</td>
//                 <td>&emsp;'.$data_desa['nama_desa'].'</td>
//             </tr>
//             <tr>';
//                 $sql_kecamatan = mysqli_query($con,"SELECT * FROM kecamatan") or die(mysqli_error($con));
//                 $data_kecamatan = mysqli_fetch_array($sql_kecamatan);
// $html .='
//                 <td>Kecamatan</td>
//                 <td>:</td>
//                 <td>&emsp;'.$data_kecamatan['nama_kecamatan'].'</td>
//             </tr>
//             <tr>
//                 <td>Tanggal Pengajuan</td>
//                 <td>:</td>
//                 <td>&emsp;'.$data['tanggal_pengajuan'].'</td>
//             </tr>
//         </table>';
// $html .='        
//             <div>';
//                 $status = '';
//                 if($data['approve1'] == 0){
//                     $status = '<span class="label label-warning">Menunggu Persetujuan Kecamatan</span>';
//                     }else if($data['approve1'] == 2){
//                         $status = '<span class="label label-danger">Pengajuan Di Tolak Kecamatan</span>';
//                 }else if($data['approve1'] == 1 && $data['approve2'] == 0 ){
//                     $status = '<span class="label label-warning">Menunggu Persetujuan Kasie</span>';
//                     }else if($data['approve2'] == 2){
//                         $status = '<span class="label label-danger">Pengajuan Di Tolak Kasie</span>';
//                 }else if($data['approve2'] == 1 && $data['approve3'] == 0){
//                     $status = '<span class="label label-warning">Menunggu Persetujuan Kabid';
//                     }else if($data['approve3'] == 2){
//                         $status = '<span class="label label-danger  ">Pengajuan Di Tolak Kabid</span>';
//                 }else if($data['approve1'] == 1 && $data['approve2'] == 1 && $data['approve3'] == 1){
//                     $status = '<span class="label label-success">Pengajuan Telah Di Setujui</span>';
//                 }
//                 $sql_bantuan = mysqli_query($con,"SELECT * FROM bantuan") or die(mysqli_error($con));
//                 $data_bantuan = mysqli_fetch_array($sql_bantuan);
// $html .='
//                 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                     Telah mengajukan alat bantuan berupa <b>1 (satu) Unit '.$data_bantuan['nama_bantuan'].',</b> Dengan status pengajuan saat ini yaitu <b>'.$status.'</b>
//                 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                 Demikian laporan pengajuan ini dibuat dengan sebenar-benarnya untuk di pergunakan sebagaimana semestinya.</p>      
//             </div>
//     <div style="position: relative; left:480px;">    
//         <table>
//             <tr ">
//                 <td>Karawang, </td>
//                 <td>'.date('d F Y').'</td>
//             </tr>
//         </table>
//         <table style="position: relative; top:80px;">
//             <tr>';
//                 $sql_pegawai = mysqli_query($con,"SELECT * FROM pegawai") or die(mysqli_error($con));
//                 $data_pegawai = mysqli_fetch_array($sql_pegawai);
// $html .='
            
//                 <td colspan="3">'.$data_pegawai['nama'].'</td>
//             </tr>
//             <tr>
//                 <td colspan="3">NIP : '.$data['nip'].'</td>
//             </tr>
//         </table>
//     </div>';

// $dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'potrait');

// // Render the HTML as PDF
// $dompdf->render();
// $tgl = date('dmy');
// $time = date('His');
// $nip = $_SESSION['nip'];
// $desa = $_SESSION['id_desa'];
// // Output the generated PDF to Browser
// $dompdf->stream("$desa-$tgl-$time.pdf", array("Attachment" => 0));

?>
<img src="../uploads/img/kabbekasi.png" style="float: left; width: 75px;">
<img src="../uploads/img/posyandu.png" style="float: right; width: 120px;">
<div style="margin-left: 20px; text-align: center;" >
<div style="font-size: 23px;">Data Imunisasi Anak</div>
<div style="font-size: 25px;">Posyandu Desa Cibatu</div>
<div style="font-size: 12px;">Jl. Kp. Bangkuang No.105, Cibatu, Cikarang Sel., Kabupaten Bekasi, Jawa Barat 17530</div>
</div>
<br>
<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">
    <?php
        $id = @$_GET['id'];
        $sql_pengajuan = mysqli_query($con,"SELECT * FROM imunisasi WHERE id_imunisasi = '$id' ") or die(mysqli_error($con));
        $data = mysqli_fetch_array($sql_pengajuan);
    ?>
    <table>
        <tr>
            <td>No Imunisasi</td>
            <td>:</td>
            <td><?=$data['id_imunisasi']?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?=date('d F Y')?></td>
        </tr>
    </table>