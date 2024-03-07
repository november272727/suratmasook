<?php
include "db/koneksi.php";
$id = $_GET['kd_sk'];
$pilih = mysqli_query($koneksi, "SELECT * FROM Surat_keluar WHERE kd_sk='$id'");
$data = mysqli_fetch_assoc($pilih);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $kd_sk = $_POST['kd_sk'];
   $nomor = $_POST['nomor'];
   $tujuan = $_POST['tujuan'];
   $file = $_FILES['file']['name'];
   $ukuran = $_FILES['file']['size'];
   $file_tmp = $_FILES['file']['tmp_name'];
   $keterangan = $_POST['keterangan'];
   $tanggal = $_POST['tanggal'];
   $isi = $_POST['isi'];

   if ($ukuran < 1044070) {
      move_uploaded_file($file_tmp, 'file/keluar/' . $file);
      $query = mysqli_query($koneksi, "UPDATE surat_keluar SET tujuan='$tujuan', nomor='$nomor', tanggal='$tanggal', keterangan='$keterangan', isi='$isi', file='$file' WHERE kd_sk='$id'");
      if ($query) {
         echo "<script>window.location = 'dashboard.php?dashboard=suratkeluar'</script>";
      } else {
         echo 'GAGAL MENGUPLOAD GAMBAR';
      }
   } else {
      echo 'UKURAN FILE TERLALU BESAR';
   }
}

?>
<div class="card">
   <div class="header">
      <div class="row">
         <div class="col-md-8">
            <h4 class="title">Mengedit Surat keluar</h4>
            <p class="category">Form Edit Surat Keluar</p>
         </div>
         <div class="col-md-4">
            <a href="dashboard.php?dashboard=suratkeluar" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-angle-left"> Kembali </i></a>
         </div>
      </div>

   </div>
   <div class="content">
      <form action="" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="nomor_surat" class="form-label">nomor surat</label>
                  <input type="text" id="nomor_surat" name="nomor" class="form-control" value="<?php echo $data['nomor']; ?>">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="asal_surat" class="form-asal_surat">Tujuan</label>
                  <input type="text" id="asal_surat" name="tujuan" class="form-control" required value="<?php echo $data['tujuan']; ?>">
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="tgl_masuk" class="form-label">Tanggal masuk</label>
                  <input type="date" id="tgl_masuk" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>">
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="tgl_diterima" class="form-label">Keterangan</label>
                  <input type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="perihal" class="form-label">Isi</label>
                  <input type="text" id="perihal" name="isi" class="form-control" value="<?php echo $data['isi']; ?>">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="file" class="form-label">file</label>
                  <input type="file" id="file" name="file" class="form-control" accept=".xlsx,.xls,.doc, .docx,.pdf" value="<?php echo $data['file']; ?>">
               </div>
            </div>
         </div>

         <button type="submit" class="btn btn-info btn-fill pull-right">Edit</button>
         <div class="clearfix"></div>
      </form>
   </div>
</div>