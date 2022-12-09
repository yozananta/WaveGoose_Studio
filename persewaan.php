<?php  
session_start();
if($_SESSION['level']==""){
    $_SESSION['gagal-login'] = "Gagal Masuk Persewaan";
    header("location:login.php");
exit;
}
include "layout/header.php";




$data_persewaan = select("SELECT * FROM t_sewa
                       INNER JOIN t_alat ON t_sewa.id_alat = t_alat.id_alat                       
                       INNER JOIN t_user ON t_sewa.id_user = t_user.id_user                       
                       ORDER BY id_sewa ASC");

$getmus = mysqli_query($koneksi, "SELECT * FROM t_alat");


if (isset($_POST['tambah'])){
    if (create_persewaan($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Data Sewa Berhasil Ditambahkan!',
        }).then(function(){
            document.location.href = 'persewaan.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Data Sewa Gagal Ditambahkan!',
        }).then(function(){
            document.location.href = 'persewaan.php';
        });
        </script>";
    }

    if (isset($_POST['edit'])) {
        if (update_persewaan($_POST) > 0) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                color: 'white',
                background: '#2D3035',
                text: 'Data Sewa Berhasil Diedit!',
            }).then(function(){
                document.location.href = 'persewaan.php';
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
                document.location.href = 'persewaan.php';
            });
            </script>";
    }
?>

<div class="page-content form-page">

    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            <h2 class="h5 mb-0">Data Sewa</h2>
        </div>
    </div>

    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Persewaan</li>
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
                                        <th>Kode Sewa</th>
                                        <th>Nama Alat</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Nama Penyewa</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Harga</th>
                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <th>Aksi</th>
                                        <?php  } ?>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_persewaan as $persewaan):   ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>SW00<?= $persewaan['id_sewa']; ?></td>
                                        <td><?= $persewaan['nama_alat']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($persewaan['tgl_sewa'])); ?></td>
                                        <td><?= date('d-m-Y', strtotime($persewaan['tgl_kembali'])); ?></td>
                                        <td><?= $persewaan['nama']; ?></td>
                                        <td><?= $persewaan['alamat']; ?></td>
                                        <td><?= $persewaan['telepon']; ?></td>
                                        <td><?= $persewaan['harga'];?> K / Hari</td>

                                        <?php if ($_SESSION['level'] == "admin") {?>
                                        <td width="20%" class="text-center">
                                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?= $persewaan['id_sewa']; ?>"><i
                                                    class="fas fa-edit"></i> Edit</button>
                                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                                                data-bs-target="#modalHapus<?= $persewaan['id_sewa']?>"><i
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
                            <h5 class="modal-title" id="myModalLabel">Tambah persewaan</h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="nama">Nama Alat</label>
                                    <select name="id_alat" id="id_alat" class="form-control">
                                        <option>--Pilih Alat Musik --</option>
                                        <?php
                                while($persewaan=mysqli_fetch_array($getmus)){?>
                                        <option name="id_alat" value="<?=$persewaan['id_alat']?>">
                                            <?=$persewaan['nama_alat']?></option>
                                        <?php }?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_sewa">Tanggal Sewa</label>
                                    <input type="date" name="tgl_sewa" id="tgl_sewa" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_kembali">Tanggal Kembali</label>
                                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control"
                                        required>
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

            <?php foreach ($data_persewaan as $persewaan) : ?>
        <div class="modal fade text-start" id="modalEdit<?= $persewaan['id_sewa']; ?>" tabindex="-1"
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
                            <input type="hidden" name="id_sewa" value="<?= $persewaan['id_sewa']; ?>">
                            <div class="mb-3">
                                <label for="select" class="form-label">Nama Alat</label>
                                <select name="id_alat" id="id_alat" class="form-control">
                                    <?php
                                    $getmus = mysqli_query($koneksi, "SELECT * FROM t_alat");
                                while($mus=mysqli_fetch_array($getmus)){?>
                                    <option value="<?=$mus['id_alat']?>"
                                        <?=$persewaan['id_alat'] == $mus['id_alat'] ? 'selected' : null ?>>
                                        <?=$mus['nama_alat']?> </option>
                                    <?php }?>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_sewa">Tanggal Sewa</label>
                                <input type="text" name="tgl_sewa" id="tgl_sewa" class="form-control"
                                    value="<?= $persewaan['tgl_sewa'];?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_kembali">Tanggal Kembali</label>
                                <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control"
                                    value="<?= $persewaan['tgl_kembali'];?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="alamat" name="alamat" id="alamat" class="form-control"
                                    value="<?= $persewaan['alamat'];?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="telepon">Telepon</label>
                                <input type="telepon" name="telepon" id="telepon" class="form-control"
                                    value="<?= $persewaan['telepon'];?>" required>
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



        <?php foreach ($data_persewaan as $persewaan) : ?>
        <div class="modal fade text-start" id="modalHapus<?= $persewaan['id_sewa']; ?>" tabindex="-1"
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
                            <p>Yakin Ingin Menghapus Data Sewa : <b><?= $persewaan['nama_customer']; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="hapus-sewa.php?id_sewa=<?= $persewaan['id_sewa'];?>" class="btn btn-danger">Hapus</a>
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