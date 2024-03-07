<?php include 'db/koneksi.php' ?>


<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == "hapus-berhasil") {
        echo "
        <div class='alert alert-primary' role='alert'>
        Data Berhasil Dihapus!
        </div>
        ";
    }
    if ($_GET['aksi'] == "add-berhasil") {
        echo "
        <div class='alert alert-succes' role='alert'>
        Data Berhasil Ditambahkan!
        </div>
        ";
    }
}


?>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="title">Daftar Surat Masuk</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="col-md-6">
                    <form class="form-inline" method="get">
                        <div class="form-group">
                            <input type="date" class="form-control" name="date1">
                        </div>
                        <div class=" form-group mx-sm-3 mb-2">
                            <input type="date" class="form-control" name="date2">
                            <input type="hidden" name="dashboard" value="suratmasuk">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Sorting</button>
                    </form>
                </div>
                <div class="col-md-1">
                    <a href="dashboard.php?dashboard=suratmasuk-add" class="btn btn-info btn-fill ml-2 pull-right"> Tambah <i class="pe-7s-next-2"></i></a>
                </div>
                <div class="col-md-1">
                    <a href="Suratmasuk_excel.php" class="btn btn-info btn-fill ml-2 pull-right"> export <i class="pe-7s-next-2"></i></a>
                </div>
            </div>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>kd_sm</th>
                    <th>nomor_surat</th>
                    <th>asal_surat</th>
                    <th>file</th>
                    <th>tgl_masuk</th>
                    <th>tgl_diterima</th>
                    <th>perihal</th>
                    <th>aksi</th>
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
                            <td>

                                <a href="dashboard.php?dashboard=suratmasuk-edit&kd_sm=<?php echo $data['kd_sm'] ?>">
                                    <button type="button" class="btn btn-primary img-circle" aria-label="Left Align">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="Suratmasuk_delete.php?kd_sm=<?php echo $data['kd_sm'] ?>" onclick="return confirm('apakah kamu yakin ingin menghapus data ini?')">
                                    <button type="button" class="btn btn-danger img-circle" aria-label="Left Align">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr class="text-center">
                        <td colspan="8">
                            <?php if (isset($_GET['date1']) || isset($_GET['date2'])) : ?>
                                <form action="Suratmasuk_excel.php" method="get">
                                    <input type="hidden" name="date1" value="<?php echo $_GET['date1'] ?>">
                                    <input type="hidden" name="date2" value="<?php echo $_GET['date2'] ?>">
                                    <button type="submit" class="btn btn-primary">Export data Sorting</button>
                                </form>
                            <?php endif ?>
                        </td>

                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>