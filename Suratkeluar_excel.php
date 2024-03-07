<?php
include "db/Koneksi.php";

if (isset($_GET['date1']) && isset($_GET['date2'])) {
    $tgl1 = $_GET['date1'];
    $tgl2 = $_GET['date2'];
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=suratkeluar-$tgl1-$tgl2.xls");
} else {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=suratkeluar.xls");
}


?>
<table class="table table-hover" border="1">
    <thead>
        <th>Kode Surat</th>
        <th>Nomor Surat</th>
        <th>Tujuan</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Isi</th>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['date1']) && isset($_GET['date2'])) {
            $date1 = $_GET['date1'];
            $date2 = $_GET['date2'];
            $query = mysqli_query($koneksi, "SELECT * FROM surat_keluar WHERE tanggal BETWEEN '$date1' AND '$date2'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM surat_keluar");
        }
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['kd_sk'] ?></td>
                <td><?php echo $data['tujuan'] ?></td>
                <td><?php echo $data['nomor'] ?></td>
                <td><?php echo $data['tanggal'] ?></td>
                <td><?php echo $data['keterangan'] ?></td>
                <td><?php echo $data['isi'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>