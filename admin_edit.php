<?php
include "db/koneksi.php";
$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'");

$data = mysqli_fetch_assoc($pilih);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $nama = $_POST['nama'];
   $username = $_POST['username'];
   $password = $_POST['password'];

   $query = mysqli_query($koneksi, "UPDATE admin SET nama='$nama', username='$username', password='$password' 
   WHERE id='$id'");
   if ($query) {
      echo "<script>window.location = 'dashboard.php?dashboard=admin'</script>";
   }
}
?>
<div class="card">
   <div class="header">
      <div class="row">
         <div class="col-md-8">
            <h4 class="title">Admin Edit</h4>
            <p class="category">Last Campaign Performance</p>
         </div>
         <div class="col-md-4">
            <a href="dashboard.php?dashboard=admin-add" class="btn btn-info btn-fill pull-right"> Tambah <i class="pe-7s-next-2"></i></a>
         </div>
      </div>

   </div>
   <div class="content">
      <form action="" method="post">
         <div class="mb-3">
            <label for="nama" class="form-nama">nama</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $data['nama'] ?>">
         </div>
         <div class="mb-3">
            <label for="username" class="form-username">username</label>
            <input type="text" id="username" name="username" class="form-control" value="<?php echo $data['username'] ?>">
         </div>
         <div class="mb-3">
            <label for="password" class="form-password">password</label>
            <input type="text" id="password" name="password" class="form-control" value="<?php echo $data['password'] ?>">
         </div>
         <button type="sumbit" class="btn btn-primary">Simpan</button>
      </form>
      <div class="footer">

         <hr>
         <div class="stats">
            <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
         </div>
      </div>
   </div>
</div>