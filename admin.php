<?php include 'db/koneksi.php' ?>

<!-- NOTIFIKASI -->
<?php if (isset($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "add-berhasil") : ?>
        <div class="alert alert-success">
            <span><b> Success - </b> Data Berhasil Ditambahkan !</span>
        </div>
    <?php endif; ?>
    <?php if ($_GET['notif'] == "edit-berhasil") : ?>
        <div class="alert alert-success">
            <span><b> Success - </b> Data Berhasil Diedit !</span>
        </div>
    <?php endif; ?>
    <?php if ($_GET['notif'] == "delete-berhasil") : ?>
        <div class="alert alert-success">
            <span><b> Success - </b> Data Berhasil Dihapus !</span>
        </div>
    <?php endif; ?>
<?php endif; ?>
<!-- NOTIFIKASI -->

<div class="card">
    <div class="header">
        <div class="row">
            <div class="col-md-8">
                <h4 class="title">Admin</h4>
                <p class="category">Last Campaign Performance</p>
            </div>
            <div class="col-md-4">
                <a href="dashboard.php?dashboard=admin-add" class="btn btn-info btn-fill pull-right"> Tambah <i class="pe-7s-next-2"></i></a>
            </div>
        </div>

    </div>
    <div class="content">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>NAMA</td>
                <td>USERNAME</td>
                <td>PASSWORD</td>
                <td>AKSI</td>

            </tr>
            <?php $query = mysqli_query($koneksi, "SELECT * FROM admin"); ?>
            <?php while ($data = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td>
                        <?php echo $data['id'] ?>
                    </td>
                    <td>
                        <?php echo $data['nama'] ?>
                    </td>
                    <td>
                        <?php echo $data['username'] ?>
                    </td>
                    <td>
                        <?php echo $data['password'] ?>
                    </td>
                    <td>
                        <a href="dashboard.php?dashboard=admin-edit&id=<?php echo $data['id'] ?>&nama=<?php echo $data['nama'] ?>" class="btn btn-primary btn-fill"><i class="pe-7s-note"></i></a>
                        <a href="admin_delete.php?id=<?php echo $data['id'] ?>" class="btn btn-danger btn-fill"><i class="pe-7s-trash"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <div class="footer">

            <hr>
            <div class="stats">
                <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
            </div>
        </div>
    </div>
</div>