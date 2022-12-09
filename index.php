<?php
session_start();
if ($_SESSION['level'] == "") {
    $_SESSION['gagal-login'] = "Gagal Masuk Home";
    header("location:login.php");
    exit;
}

include "layout/header.php";



$data_persewaan = select("SELECT * FROM t_sewa
                       INNER JOIN t_alat ON t_sewa.id_alat = t_alat.id_alat                       
                       ORDER BY id_sewa ASC");

$getmus = mysqli_query($koneksi, "SELECT * FROM t_alat");


if (isset($_POST['tambah'])) {
    if (create_persewaan($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Pesanan Alat Berhasil Dibuat, Cek History Pemesanan!',
        }).then(function(){
            document.location.href = 'index.php';
        });
        </script>";
    } else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Pesanan Gagal Dibuat!',
        }).then(function(){
            document.location.href = 'index.php';
        });
        </script>";
}




?>

<style>
    .zoom-in-out-box {
  animation: zoom-in-zoom-out 1s ease infinite;
}

@keyframes zoom-in-zoom-out {
  0% {
    transform: scale(1, 1);
  }
  50% {
    transform: scale(1.05, 1.05);
  }
  100% {
    transform: scale(1, 1);
  }
}
</style>


<div class="page-content">
    <br><br>
    <div class="container-fluid">

        <div class="card text-center text-white">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6 text-md-start text-center py-6">

                        <h1 class="mb-4 fs-9 fw-bold">Welcome to <strong
                                class="text-primary">WVGS-</strong><strong>Studio</strong></h1>
                        <p class="mb-6 lead text-secondary">WVGS Studio adalah perusahaan yang bergerak di bidang <br
                                class="d-none d-xl-block" />jasa penyewaan sound system,rental alat musik/band,<br
                                class="d-none d-xl-block" />efek, maupun sampai speaker sound.</p>
                        <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#pembelian"
                                role="button"><b class="text-white"> Get Started!</b></a></div>
                    </div>
                    <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid zoom-in-out-box" style="width: 90%;"
                            src="loginstyle/images/loginicon.png" alt="" /></div>
                </div>
            </div>
        </div>
    </div>

    </section>
    <br>

    <br>
    <section class="pt-0">
        <div class="container-fluid">
            <br><br>
            <div class="container">
                <h1 class="fs-9 fw-bold mb-5 text-center text-white"> Jasa apa saja yang <br
                        class="d-none d-xl-block mb-5" />kami
                    tawarkan?</h1>
                <br>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon5.png"
                            width="75" alt="Feature" />
                        <h4 class="mb-3">Rental Alat Musik</h4>
                        <p class="mb-0 fw-medium text-secondary">Menyediakan jasa Sewa Alat Musik untuk keperluan event
                            Anda. Seperti untuk pernikahan, gathering, acara reuni, perpisahan, dan lain sebagainya.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/speaker.png"
                            width="75" alt="Feature" />
                        <h4 class="mb-3">Mixing Audio Live</h4>
                        <p class="mb-0 fw-medium text-secondary">Memberikan pengalaman panggung yang maksimal dengan
                            kualitas mixing dari kami
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/studio.png"
                            width="75" alt="Feature" />
                        <h4 class="mb-3">Rental Studio Musik</h4>
                        <p class="mb-0 fw-medium text-secondary">Studio recording yang kami sewakan biasanya dipakai
                            untuk merekam lagu / demo musisi atau latihan.</p>

                    </div>
                </div>
                <br><br><br><br>


            </div>




            <div class="container-fluid">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/carousel/1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/carousel/2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/carousel/3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
   

    </section>

    <section class="pt-0" id="pembelian">
        <div class="container-fluid">
            <div class="card text-center text-white">
                <div class="card-body">
                    <div class="row"><br><br>
                        <div class="col-lg-6 mx-auto">
                            <h2 class="fs-7 fw-bold mt-5">Sewa Alat Musik</h2>
                            <br><br>
                            <p class="mb-5 fw-medium text-secondary lead">
                                <strong class="text-primary">WVGS -</strong> <strong>Studio</strong> menyediakan jasa
                                Sewa Alat Musik untuk keperluan event Anda. Seperti untuk
                                pernikahan, gathering, acara reuni, perpisahan, dan lain sebagainya.

                                Tentunya kami menyediakan rental alat musik yang profesional yang dapat Anda pergunakan
                                sesuai kebutuhan acara Anda. Kamu tinggal memilih mana alat yang sesuai dengan kondisi
                                acara dan budget kamu.

                                Alat musik yang kami sediakan seperti Drum, Bass, Gitar, Keyboard, Sound, Microphone
                                merupakan yang terbaik dan dalam kondisi baik, sehingga Anda pun nyaman.
                            </p>
                            <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal"
                                data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Buat Pesanan</button>
                        </div>
                        <div class="col-lg-5"><img class="img-fluid zoom-in-out-box" src="img/card/sewamusik.png" style="width: 75%;"
                                alt="" /></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade text-start" id="modalTambah" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Buat Pesanan</h5>
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
                                    while ($persewaan = mysqli_fetch_array($getmus)) { ?>
                                    <option name="id_alat" value="<?= $persewaan['id_alat'] ?>">
                                        <?= $persewaan['nama_alat'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_sewa">Tanggal Sewa</label>
                                <input type="date" name="tgl_sewa" id="tgl_sewa" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_kembali">Tanggal Kembali</label>
                                <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
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
                        <button type="submit" name="tambah" class="btn btn-primary">Buat</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="card text-center text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6"><img class="img-fluid mt-5 zoom-in-out-box" src="img/card/sewastudio.png" style="width: 75%;" alt="" />
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <h2 class="fs-7 fw-bold mt-5">Sewa Ruang Studio</h2>
                            <br><br>
                            <p class="mb-4 fw-medium text-secondary lead">
                                Studio recording yang kami sewakan biasanya dipakai untuk merekam lagu / demo musisi
                                atau penyanyi yang ingin mengabadikan karyanya dalam sebuah produk digital dan agar bisa
                                di dengarkan secara pribadi maupun di publikasikan ke masyarakat untuk mendapatkan
                                sebuah keuntungan finansial maupun agar bisa dikenal masyarakat banyak. Peralatan yang
                                kami gunakan adalah peralatan profesional dan setara dengan studio recording dari label
                                musik yang sudah ada.
                            </p>
                            <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal"
                                data-bs-target="#modalTambahStudio"><i class="fas fa-plus-circle"></i> Buat Pesanan</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>

                        <?php

                $data_sewastudio = select("SELECT * FROM t_sewastudio
                            INNER JOIN t_studio ON t_sewastudio.id_studio = t_studio.id_studio                       
                            ORDER BY id_pesan ASC");

                $getstud = mysqli_query($koneksi, "SELECT * FROM t_studio");


                if (isset($_POST['tambahstudio'])) {
                    if (create_sewastudio($_POST) > 0) {
                        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    color: 'white',
                    background: '#2D3035',
                    text: 'Pesanan Studio Berhasil Dibuat, Cek History Pemesanan!',
                }).then(function(){
                    document.location.href = 'index.php';
                });
                </script>";
                    } else
                        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    color: 'white',
                    background: '#2D3035',
                    text: 'Pesanan Gagal Dibuat!',
                }).then(function(){
                    document.location.href = 'index.php';
                });
                </script>";
                }

                ?>

    <?php foreach ($data_sewastudio as $sewastudio) : ?>
    <div class="modal fade text-start" id="modalTambahStudio" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Buat Pesanan</h5>
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
                            <input type="datetime-local" value="<?= $sewastudio['tgl_latihan']; ?>"
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
                    <button type="submit" name="tambahstudio" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    </section>
<br><br><br><br>
    <section class="pt-0">
        <div class="container-fluid">
                    <br>
                    <div class="row mb-4 mt-3 text-center">
                        <h2>About<b class="text-muted"> Me</b>
                        </h2>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-5 text-justify">
                            <p class="lead">
                                Perkenalkan nama saya Yozakha Kirnanta, saya adalah mahasiswa semester 3 jurusan
                                Sistem
                                Informasi di Universitas Gajayana Malang.
                                Ini adalah project UTS Pemrograman Internet saya, mohon maaf jika ada kekurangan
                                atau
                                kesalahan kurang lebihnya terima kasih.



                            </p>
                        </div>
                        <div class="col-md-5 text-justify">
                            <p class="lead">
                                WVGS Studio adalah perusahaan yang bergerak di bidang jasa penyewaan sound system
                                serta
                                rental alat
                                musik / band, efek, maupun sampai speaker sound.
                                WVGS Studio berdomisili di Malang, tepatnya di Jl. Merdeka Selatan, Kiduldalem, Kec.
                                Klojen, Kota Malang, Jawa Timur. dan melayani untuk daerah Malang, dan sekitarnya.


                            </p>
                        </div>
                   
                <br><br><br><br>
            </div>

        </div>
    </section>
    <br><br><br><br><br><br>



    <section class="pt-0">
        <div class="container-fluid ">
            <div class="card-group justify-content-center ">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body bg-danger text-white pt-4 pb-5">
                                <h3 class="card-title"><i class="fas fa-hourglass"></i> Opening Hours</h3>
                                <p class="card-text">Monday-Sunday : 08:00-22:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body bg-primary text-white">
                                <h3 class="card-title "><i class="fas fa-briefcase"></i> Our Office</h3>
                                <p class="card-text">Jl. Merdeka Selatan, Kiduldalem, Kec. Klojen, Kota Malang, Jawa
                                    Timur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body bg-success text-white pt-4 pb-5 ">
                                <h3 class="card-title"><i class="fas fa-address-card"></i> Contact Me</h3>
                                <p class="card-text">(+62) 857-8290-8765</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<br><br><br>
    <?php
    include "layout/footer.php";


    ?>