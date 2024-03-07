<?php
include "db/Koneksi.php";

if (isset($_GET['date1']) && isset($_GET['date2'])) {
    $tgl1 = $_GET['date1'];
    $tgl2 = $_GET['date2'];
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=suratmasuk-$tgl1-$tgl2.xls");
} else {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=suratmasuk.xls");
}
?>
<table class="table table-hover table-striped" border="1">
    <thead>
        <th>kd_sm</th>
        <th>nomor_surat</th>
        <th>asal_surat</th>
        <th>file</th>
        <th>tgl_masuk</th>
        <th>tgl_diterima</th>
        <th>perihal</th>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['date1']) || isset($_GET['date2'])) {
            $query = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE tgl_masuk BETWEEN '" . $_GET['date1'] . "' AND '" . $_GET['date2'] . "'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM surat_masuk");
        }
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['kd_sm'] ?></td>
                <td><?php echo $data['nomor_surat'] ?></td>
                <td><?php echo $data['asal_surat'] ?></td>
                <td><?php echo $data['file'] ?></td>
                <td><?php echo $data['tgl_masuk'] ?></td>
                <td><?php echo $data['tgl_diterima'] ?></td>
                <td><?php echo $data['perihal'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>