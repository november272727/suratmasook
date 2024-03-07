<?php
include 'db/koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $kd_sm = $_POST['kd_sm'];
   $nomor_surat = $_POST['nomor_surat'];
   $asal_surat = $_POST['asal_surat'];
   $file = $_FILES['file']['name'];
   $ukuran = $_FILES['file']['size'];
   $file_tmp = $_FILES['file']['tmp_name'];
   $tgl_masuk = $_POST['tgl_masuk'];
   $tgl_diterima = $_POST['tgl_diterima'];
   $perihal = $_POST['perihal'];

   if ($ukuran < 1044070) {
      move_uploaded_file($file_tmp, 'file/masuk/' . $file);
      $query = mysqli_query($koneksi, "INSERT INTO surat_masuk VALUES('$kd_sm','$nomor_surat','$asal_surat','$file','$tgl_masuk','$tgl_diterima','$perihal')");
      if ($query) {
         echo "<script>window.location = 'dashboard.php?dashboard=suratmasuk'</script>";
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
            <h4 class="title">Menambah Surat Masuk</h4>
            <p class="category">Form Pengisian Surat Masuk</p>
         </div>
         <div class="col-md-4">
            <a href="dashboard.php?dashboard=suratmasuk" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-angle-left"> Kembali </i></a>
         </div>
      </div>

   </div>
   <div class="content">
      <form action="" method="post" enctype="multipart/form-data">

         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="kd_sm" class="form-kd_sm">Kode Surat Masuk</label>
                  <input type="text" id="kd_sm" name="kd_sm" class="form-control" value="<?php echo (strtotime("now")); ?>">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="nomor_surat" class="form-nomor_surat">nomor surat</label>
                  <input type="text" id="nomor_surat" name="nomor_surat" class="form-control">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="asal_surat" class="form-asal_surat">asal surat</label>
                  <input type="text" id="asal_surat" name="asal_surat" class="form-control" required>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="file" class="form-label">file</label>
                  <input type="file" id="file" name="file" class="form-control" accept=".xlsx,.xls,.doc, .docx,.pdf">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="tgl_masuk" class="form-label">Tanggal masuk</label>
                  <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="tgl_diterima" class="form-label">tanggal diterima</label>
                  <input type="date" id="tgl_diterima" name="tgl_diterima" class="form-control">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="perihal" class="form-perihal">perihal</label>
                  <input type="text" id="perihal" name="perihal" class="form-control">
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-info btn-fill pull-right">Simpan</button>
         <div class="clearfix"></div>
      </form>
   </div>
</div>