<?php 
session_start();
if($_SESSION['level']==""){
    $_SESSION['gagal-login'] = "Gagal Masuk Dashboard";
    header("location:login.php");
exit;
}
if ($_SESSION['level'] == "admin") {
include "layout/header.php";

$data_user = select("SELECT * FROM t_user");



$data_persewaan = select("SELECT * FROM t_sewa
                       INNER JOIN t_alat ON t_sewa.id_alat = t_alat.id_alat  
                       INNER JOIN t_user ON t_sewa.id_user = t_user.id_user                        
                       ORDER BY id_sewa ASC");
              
 ?>


<div class="page-content">
    <!-- Page Header-->
    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            <h2 class="h5 mb-0">Dashboard</h2>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-end justify-content-between mb-2">
                                <div class="me-2">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                                        <use xlink:href="#user-1"> </use>
                                    </svg>
                                    <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Akun</p>
                                </div>
                                <?php
                            $data_user = mysqli_query($koneksi,"SELECT * FROM t_user");
                            $tampil_user = mysqli_num_rows($data_user);
                            ?>
                                <p class="text-xxl lh-1 mb-0 text-dash-color-1"><?= $tampil_user ?></p>
                            </div>
                            <div class="progress" style="height: 3px">
                                <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-end justify-content-between mb-2">
                                <div class="me-2">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                                        <use xlink:href="#stack-1"> </use>
                                    </svg>
                                    <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Penyewa Alat</p>
                                </div>
                                <?php
                            $data_alat = mysqli_query($koneksi,"SELECT * FROM t_sewa");
                            $tampil_alat = mysqli_num_rows($data_alat);
                            ?>
                                <p class="text-xxl lh-1 mb-0 text-dash-color-2"><?= $tampil_alat ?></p>
                            </div>
                            <div class="progress" style="height: 3px">
                                <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 70%"
                                    aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-end justify-content-between mb-2">
                                <div class="me-2">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                                        <use xlink:href="#survey-1"> </use>
                                    </svg>
                                    <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Penyewa Studio</p>
                                </div>
                                <?php
                            $data_sewastudio = mysqli_query($koneksi,"SELECT * FROM t_sewastudio");
                            $tampil_sewastudio = mysqli_num_rows($data_sewastudio);
                            ?>
                                <p class="text-xxl lh-1 mb-0 text-dash-color-3"><?= $tampil_sewastudio ?></p>
                            </div>
                            <div class="progress" style="height: 3px">
                                <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: 55%"
                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-end justify-content-between mb-2">
                                <div class="me-2">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                                        <use xlink:href="#paper-stack-1"> </use>
                                    </svg>
                                    <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Ruang Studio</p>
                                </div>
                                <?php
                            $data_studio = mysqli_query($koneksi,"SELECT * FROM t_studio");
                            $tampil_studio = mysqli_num_rows($data_studio);
                            ?>
                                <p class="text-xxl lh-1 mb-0 text-dash-color-3"><?= $tampil_studio ?></p>
                            </div>
                            <div class="progress" style="height: 3px">
                                <div class="progress-bar bg-dash-color-4" role="progressbar" style="width: 35%"
                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="tables py-0">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="h4 mb-0">Data Akun</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0 table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>

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

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="user.php" type="button" class="btn btn-danger mt-4"><i class="fas fa-wrench"></i>
                                Maintenance</a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="h4 mb-0">Data Alat</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0 table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Alat</th>
                                            <th>Harga</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $data_alat = select("SELECT * FROM t_alat"); ?>

                                        <?php $no = 1; ?>
                                        <?php foreach ($data_alat as $alat) :   ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $alat['nama_alat']; ?></td>
                                            <td><?= $alat['harga']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="alat.php" type="button" class="btn btn-danger mt-4"><i class="fas fa-wrench"></i>
                                Maintenance</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="h4 mb-0">Data Sewa Studio</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0 table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Pesan</th>
                                            <th>Tipe Studio</th>
                                            <th>Tanggal Main</th>
                                            <th>Waktu Main</th>
                                            <th>Nama Penyewa</th>
                                            <th>Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $data_sewastudio = select("SELECT * FROM t_sewastudio
                                                      INNER JOIN t_studio ON t_sewastudio.id_studio = t_studio.id_studio       
                                                      INNER JOIN t_user ON t_sewastudio.id_user = t_user.id_user                    
                                                      ORDER BY id_pesan ASC");
                                        ?>

                                        <?php $no = 1; ?>
                                        <?php foreach ($data_sewastudio as $sewastudio) :   ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>PS00<?= $sewastudio['id_pesan']; ?></td>
                                            <td><?= $sewastudio['nama_studio']; ?> Studio</td>
                                            <td><?= date('d-m-Y | H:i', strtotime($sewastudio['tgl_latihan'])); ?></td>
                                            <td><?= $sewastudio['waktu']; ?> Jam</td>
                                            <td><?= $sewastudio['nama']; ?></td>
                                            <td><?= $sewastudio['harga_studio'] * $sewastudio['waktu']; ?> K </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="sewastudio.php" type="button" class="btn btn-danger mt-4"><i
                                    class="fas fa-wrench"></i> Maintenance</a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="h4 mb-0">Data Sewa Alat</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0 table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Sewa</th>
                                            <th>Nama Alat</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Nama Penyewa</th>
                                            <th>Alamat</th>

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


                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="persewaan.php" type="button" class="btn btn-danger mt-4"><i
                                    class="fas fa-wrench"></i> Maintenance</a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="h4 mb-0">Data Studio</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0 table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Studio</th>
                                            <th>Harga Studio</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $data_studio = select("SELECT * FROM t_studio"); ?>

                                        <?php $no = 1; ?>
                                        <?php foreach ($data_studio as $studio) :   ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $studio['nama_studio']; ?></td>
                                            <td><?= $studio['harga_studio']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="studio.php" type="button" class="btn btn-danger mt-4"><i class="fas fa-wrench"></i>
                                Maintenance</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php 
include "layout/footer.php";
 ?>

    <?php  }
else {
    header("location:index.php");
} ?>