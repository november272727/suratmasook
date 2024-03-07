<?php
include "db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "INSERT INTO admin VALUES('$id','$nama','$username','$password')");
    if ($query) {
        echo "berhasil";
    }
}
?>

<div class="col-md-12">
    <h1>Menambah Admin</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="id" class="form-id">id</label>
            <input type="text" id="id" name="id" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-nama">nama</label>
            <input type="text" id="nama" name="nama" class="form-control">
        </div>
        <div class="mb-3">
            <label for="username" class="form-username">username</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-password">password</label>
            <input type="text" id="password" name="password" class="form-control">
        </div>
        <button type="sumbit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>