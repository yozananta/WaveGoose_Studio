<?php
session_start();
if($_SESSION['level']==""){
    $_SESSION['gagal-login'] = "Gagal Masuk Sewa Studio";
    header("location:login.php");
exit;
}

include "layout/header.php";




$data_sewastudio = select("SELECT * FROM t_sewastudio
                       INNER JOIN t_studio ON t_sewastudio.id_studio = t_studio.id_studio   
                       INNER JOIN t_user ON t_sewastudio.id_user = t_user.id_user                       
                       ORDER BY id_pesan ASC");

$getstud = mysqli_query($koneksi, "SELECT * FROM t_studio");


if (isset($_POST['tambah'])) {
    if (create_sewastudio($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Data Sewa Berhasil Ditambahkan!',
        }).then(function(){
            document.location.href = 'sewastudio.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Data Sewa Gagal Ditambahkan!',
        }).then(function(){
            document.location.href = 'sewastudio.php';
        });
        </script>";
}

if (isset($_POST['edit'])) {
    if (update_sewastudio($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Data Sewa Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'sewastudio.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Data Sewa Gagal Diedit!',
        }).then(function(){
            document.location.href = 'sewastudio.php';
        });
        </script>";
}
?>

<div class="page-content form-page">

    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            <h2 class="h5 mb-0">Data Sewa Studio</h2>
        </div>
    </div>

    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Sewa Studio</li>
            </ol>
        </nav>
    </div>

    <section class="tables py-0">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card mb-0">
                    <div class="card-body pt-0">
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-striped table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pesan</th>
                                        <th>Tipe Studio</th>
                                        <th>Tanggal Main</th>
                                        <th>Waktu Main</th>
                                        <th>Nama Penyewa</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Harga Studio</th>
                                        <th>Total</th>
                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <th>Aksi</th>
                                        <?php  } ?>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_sewastudio as $sewastudio) :   ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>PS00<?= $sewastudio['id_pesan']; ?></td>
                                        <td><?= $sewastudio['nama_studio']; ?> Studio</td>
                                        <td><?= date('d-m-Y | H:i', strtotime($sewastudio['tgl_latihan'])); ?></td>
                                        <td><?= $sewastudio['waktu']; ?> Jam</td>
                                        <td><?= $sewastudio['nama']; ?></td>
                                        <td><?= $sewastudio['alamat']; ?></td>
                                        <td><?= $sewastudio['telepon']; ?></td>
                                        <td><?= $sewastudio['harga_studio']; ?> K / Jam</td>
                                        <td><?= $sewastudio['harga_studio'] * $sewastudio['waktu']; ?> K </td>

                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <td width="20%" class="text-center">
                                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?= $sewastudio['id_pesan']; ?>"><i
                                                    class="fas fa-edit"></i> Edit</button>
                                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalHapus<?= $sewastudio['id_pesan'] ?>"><i
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
            <div class="modal fade text-start" id="modalTambah" tabindex="-1" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Tambah Persewaan</h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="nama">Jenis Studio</label>
                                    <select name="id_studio" id="id_studio" class="form-control">
                                        <option>--Pilih Jenis Studio --</option>
                                        <?php
                                        while ($sewastudio = mysqli_fetch_array($getstud)) { ?>
                                        <option name="id_studio" value="<?= $sewastudio['id_studio'] ?>">
                                            <?= $sewastudio['nama_studio'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_latihan">Tanggal Main</label>
                                    <input type="datetime-local"
                                        value="<?= $sewastudio['tgl_latihan']; ?>"
                                        class="form-control" name="tgl_latihan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu">Waktu Main <small>(Berapa Jam?)</small></label>
                                    <input type="number" name="waktu" id="waktu" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon">Telepon</label>
                                    <input type="number" name="telepon" id="telepon" class="form-control" required>
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

            <?php foreach ($data_sewastudio as $sewastudio) : ?>
            <div class="modal fade text-start" id="modalEdit<?= $sewastudio['id_pesan']; ?>" tabindex="-1"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Ubah Data Sewa</h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id_pesan" value="<?= $sewastudio['id_pesan']; ?>">
                                <div class="mb-3">
                                    <label for="select" class="form-label">Jenis Studio</label>
                                    <select name="id_studio" id="id_studio" class="form-control">
                                        <?php
                                            $getstud = mysqli_query($koneksi, "SELECT * FROM t_studio");
                                            while ($stud = mysqli_fetch_array($getstud)) { ?>
                                        <option value="<?= $stud['id_studio'] ?>"
                                            <?= $sewastudio['id_studio'] == $stud['id_studio'] ? 'selected' : null ?>>
                                            <?= $stud['nama_studio'] ?> </option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tgl_latihan">Tanggal Sewa</label>
                                    <input type="datetime-local" name="tgl_latihan" id="tgl_latihan" class="form-control"
                                        value="<?= $sewastudio['tgl_latihan']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="waktu">Waktu Main <small>(Berapa Jam?)</small></label>
                                    <input type="number" name="waktu" id="waktu" class="form-control"
                                        value="<?= $sewastudio['waktu']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat">Alamat</label>
                                    <input type="alamat" name="alamat" id="alamat" class="form-control"
                                        value="<?= $sewastudio['alamat']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon">Telepon</label>
                                    <input type="telepon" name="telepon" id="telepon" class="form-control"
                                        value="<?= $sewastudio['telepon']; ?>" required>
                                </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="edit" class="btn btn-success">Edit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>



            <?php foreach ($data_sewastudio as $sewastudio) : ?>
            <div class="modal fade text-start" id="modalHapus<?= $sewastudio['id_pesan']; ?>" tabindex="-1"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Hapus Sewa</h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <p>Yakin Ingin Menghapus Data Sewa Studio : <b><?= $sewastudio['nama_customer']; ?></b> ?</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <a href="hapus-sewastudio.php?id_pesan=<?= $sewastudio['id_pesan']; ?>"
                                class="btn btn-danger">Hapus</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>



        </div>

</div>

</section>

<?php
include "layout/footer.php";
?>