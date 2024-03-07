<?php
include "db/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM admin WHERE id='$id'");

if ($query) {
    header("location:admin.php?aksi=hapus-berhasil");
}
