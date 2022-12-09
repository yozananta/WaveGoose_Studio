<?php
session_start();
if($_SESSION['level']==""){
    $_SESSION['gagal-login'] = "Gagal Masuk Studio";
    header("location:login.php");
exit;
}

include "layout/header.php";




$data_studio = select("SELECT * FROM t_studio");




if (isset($_POST['tambah'])) {
    if (create_studio($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Studio Berhasil Ditambahkan!',
        }).then(function(){
            document.location.href = 'studio.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Studio Gagal Ditambahkan!',
        }).then(function(){
            document.location.href = 'studio.php';
        });
        </script>";
}

if (isset($_POST['edit'])) {
    if (update_studio($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Studio Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'studio.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Studio Gagal Diedit!',
        }).then(function(){
            document.location.href = 'studio.php';
        });
        </script>";
}

?>

<div class="page-content form-page">

    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            <h2 class="h5 mb-0">Data Studio</h2>
        </div>
    </div>

    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Studio</li>
            </ol>
        </nav>
    </div>

    <section class="tables py-0">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card mb-0">
                    <div class="card-body pt-0">
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Tambah Studio</button>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-striped table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Studio</th>
                                        <th>Harga Studio</th>
                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <th>Aksi</th>
                                        <?php  } ?>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_studio as $studio) :   ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $studio['nama_studio']; ?></td>
                                        <td><?= $studio['harga_studio']; ?></td>
                                        
                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <td width="20%" class="text-center">
                                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?= $studio['id_studio']; ?>"><i
                                                    class="fas fa-edit"></i> Edit</button>
                                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalHapus<?= $studio['id_studio']?>"><i
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
                        <h5 class="modal-title" id="myModalLabel">Tambah Studio</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nama_studio">Nama Studio</label>
                                <input type="text" name="nama_studio" id="nama_studio" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga_studio">Harga Studio</label>
                                <input type="text" name="harga_studio" id="harga_studio" class="form-control" required>
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


        <?php foreach ($data_studio as $studio) : ?>
        <div class="modal fade text-start" id="modalEdit<?= $studio['id_studio']; ?>" tabindex="-1"
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
                            <input type="hidden" name="id_studio" value="<?= $studio['id_studio']; ?>">
                            <div class="mb-3">
                                <label for="nama_studio">Nama Studio</label>
                                <input type="text" name="nama_studio" id="nama_studio" class="form-control"
                                    value="<?= $studio['nama_studio'];?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga_studio">Harga Studio</label>
                                <input type="text" name="harga_studio" id="harga_studio" class="form-control"
                                    value="<?= $studio['harga_studio'];?>" required>
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



        <?php foreach ($data_studio as $studio) : ?>
        <div class="modal fade text-start" id="modalHapus<?= $studio['id_studio']; ?>" tabindex="-1"
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
                            <p>Yakin Ingin Menghapus Studio : <b><?= $studio['nama_studio']; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="hapus-studio.php?id_studio=<?= $studio['id_studio'];?>" class="btn btn-danger">Hapus</a>
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