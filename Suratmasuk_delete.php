<?php
include "db/koneksi.php";

$id = $_GET['kd_sm'];

$query = mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE kd_sm='$id'");

if ($query) {
    echo "<script>window.location = 'dashboard.php?dashboard=suratmasuk'</script>";
}
