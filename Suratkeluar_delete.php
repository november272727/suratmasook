<?php
include "db/koneksi.php";

$id = $_GET['kd_sk'];

$query = mysqli_query($koneksi, "DELETE FROM surat_keluar WHERE kd_sk='$id'");

if ($query) {
    echo "<script>window.location = 'dashboard.php?dashboard=suratkeluar'</script>";
}
