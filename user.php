<?php
session_start();
if($_SESSION['level']==""){
    $_SESSION['gagal-login'] = "Gagal Masuk User";
    header("location:login.php");
exit;
}

include "layout/header.php";




$data_user = select("SELECT * FROM t_user");




if (isset($_POST['tambah'])) {
    if (create_user($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'User Berhasil Ditambahkan!',
        }).then(function(){
            document.location.href = 'user.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'User Gagal Ditambahkan!',
        }).then(function(){
            document.location.href = 'user.php';
        });
        </script>";
}

if (isset($_POST['edit'])) {
    if (update_user($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'User Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'user.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'User Gagal Diedit!',
        }).then(function(){
            document.location.href = 'user.php';
        });
        </script>";
}

?>

<div class="page-content form-page">
    <!-- Page Header-->
    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            <h2 class="h5 mb-0">Data User</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel User</li>
            </ol>
        </nav>
    </div>

    <section class="tables py-0">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card mb-0">
                    <div class="card-body pt-0">
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Tambah User</button>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-striped table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Level</th>
                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <th>Aksi</th>
                                        <?php  } ?>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_user as $user) :   ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $user['nama']; ?></td>
                                        <td><?= $user['username']; ?></td>
                                        <td><?= $user['password']; ?></td>
                                        <td><?= $user['level']; ?></td>

                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <td width="20%" class="text-center">
                                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?= $user['id_user']; ?>"><i
                                                    class="fas fa-edit"></i> Edit</button>
                                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalHapus<?= $user['id_user']?>"><i
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
                        <h5 class="modal-title" id="myModalLabel">Tambah User</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-control" name="level" id="level" required>
                                    <option value="">--Level Akun--</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="customer">Customer</option>
                                </select>
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


        <?php foreach ($data_user as $user) : ?>
        <div class="modal fade text-start" id="modalEdit<?= $user['id_user']; ?>" tabindex="-1"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Ubah User</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="<?= $user['nama'];?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="<?= $user['username'];?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    value="<?= $user['password'];?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="level">Level</label>
                                <select class="form-control" name="level" id="level" required>
                                    <?php  $level = $user['level'];?>
                                    <option value="admin" <?= $level == 'admin' ? 'selected' : null ?>>Admin</option>
                                    <option value="petugas" <?= $level == 'petugas' ? 'selected' : null ?>>Petugas
                                    </option>
                                    <option value="customer" <?= $level == 'customer' ? 'selected' : null ?>>Customer
                                    </option>
                                </select>
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



        <?php foreach ($data_user as $user) : ?>
        <div class="modal fade text-start" id="modalHapus<?= $user['id_user']; ?>" tabindex="-1"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Hapus User</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <p>Yakin Ingin Menghapus User : <b><?= $user['nama']; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="hapus-user.php?id_user=<?= $user['id_user'];?>" class="btn btn-danger">Hapus</a>
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