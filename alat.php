<?php
session_start();
if($_SESSION['level']==""){
    $_SESSION['gagal-login'] = "Gagal Masuk Alat";
    header("location:login.php");
exit;
}
include "layout/header.php";




$data_alat = select("SELECT * FROM t_alat");




if (isset($_POST['tambah'])) {
    if (create_alat($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Alat Berhasil Ditambahkan!',
        }).then(function(){
            document.location.href = 'alat.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Alat Gagal Ditambahkan!',
        }).then(function(){
            document.location.href = 'alat.php';
        });
        </script>";
}

if (isset($_POST['edit'])) {
    if (update_alat($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Alat Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'alat.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Alat Gagal Diedit!',
        }).then(function(){
            document.location.href = 'alat.php';
        });
        </script>";
}

?>

<div class="page-content form-page">

    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            <h2 class="h5 mb-0">Data Alat</h2>
        </div>
    </div>

    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Alat</li>
            </ol>
        </nav>
    </div>

    <section class="tables py-0">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card mb-0">
                    <div class="card-body pt-0">
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Tambah Alat</button>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-striped table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alat</th>
                                        <th>Harga</th>
                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <th>Aksi</th>
                                        <?php  } ?>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_alat as $alat) :   ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $alat['nama_alat']; ?></td>
                                        <td><?= $alat['harga']; ?></td>
                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <td width="20%" class="text-center">
                                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?= $alat['id_alat']; ?>"><i
                                                    class="fas fa-edit"></i> Edit</button>
                                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalHapus<?= $alat['id_alat']?>"><i
                                                    class="fas fa-trash-alt"></i>
                                                Hapus</button>
                                        </td>
                                        <?php  } ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="modal fade text-start" id="modalTambah" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Tambah Alat</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nama_alat">Nama Alat</label>
                                <input type="text" name="nama_alat" id="nama_alat" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <?php foreach ($data_alat as $alat) : ?>
        <div class="modal fade text-start" id="modalEdit<?= $alat['id_alat']; ?>" tabindex="-1"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Ubah Alat</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_alat" value="<?= $alat['id_alat']; ?>">
                            <div class="mb-3">
                                <label for="nama_alat">Nama Alat</label>
                                <input type="text" name="nama_alat" id="nama_alat" class="form-control"
                                    value="<?= $alat['nama_alat'];?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control"
                                    value="<?= $alat['harga'];?>" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button href="" type="submit" name="edit" class="btn btn-success">Edit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>



        <?php foreach ($data_alat as $alat) : ?>
        <div class="modal fade text-start" id="modalHapus<?= $alat['id_alat']; ?>" tabindex="-1"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Hapus Alat</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <p>Yakin Ingin Menghapus Alat : <b><?= $alat['nama_alat']; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="hapus-alat.php?id_alat=<?= $alat['id_alat'];?>" class="btn btn-danger">Hapus</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php endforeach; ?>


</div>

</div>
</div>
</section>

<?php
include "layout/footer.php";
?>