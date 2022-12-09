<div class="container-fluid mt-4">

    <div class="card mb-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 table-bordered table-striped table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pesan</th>
                            <th>Tipe Studio</th>
                            <th>Tanggal Main</th>
                            <th>Waktu Main</th>
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