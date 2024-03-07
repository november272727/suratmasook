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
                    <h4 class="title">Daftar Surat Keluar</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="col-md-6">
                    <form class="form-inline" method="get">
                        <div class="form-group">
                            <input type="date" class="form-control" name="date1">
                        </div>
                        <div class=" form-group mx-sm-3 mb-2">
                            <input type="date" class="form-control" name="date2">
                            <input type="hidden" name="dashboard" value="suratkeluar">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Sorting</button>
                    </form>
                </div>
                <div class="col-md-1">
                    <a href="dashboard.php?dashboard=suratkeluar-add" class="btn btn-info btn-fill ml-2 pull-right"> Tambah <i class="pe-7s-next-2"></i></a>
                </div>
                <div class="col-md-1">
                    <a href="Suratkeluar_excel.php" class="btn btn-info btn-fill ml-2 pull-right"> export <i class="pe-7s-next-2"></i></a>
                </div>
            </div>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                    <th>Kode Surat</th>
                    <th>Nomor Surat</th>
                    <th>Tujuan</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Isi</th>
                    <th>File</th>
                    <th>Aksi</th>
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
                            <td><?php echo $data['nomor'] ?></td>
                            <td><?php echo $data['tujuan'] ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                            <td><?php echo $data['keterangan'] ?></td>
                            <td><?php echo $data['isi'] ?></td>
                            <td><?php echo $data['file'] ?></td>
                            <td>

                                <a href="dashboard.php?dashboard=suratkeluar-edit&kd_sk=<?php echo $data['kd_sk'] ?>">
                                    <button type="button" class="btn btn-primary img-circle" aria-label="Left Align">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="Suratkeluar_delete.php?kd_sk=<?php echo $data['kd_sk'] ?>" onclick="return confirm('apakah kamu yakin ingin menghapus data ini?')">>
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
                        <td colspan="7">
                            <?php if (isset($_GET['date1']) || isset($_GET['date2'])) : ?>
                                <form action="Suratkeluar_excel.php" method="get">
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
        <table class="table table-hover table-striped">


        </table>

    </div>
</div>
</div>