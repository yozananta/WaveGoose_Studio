<div class="container-fluid mt-4">
       
       <div class="card mb-5">
           <div class="card-body">
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

                                   </tr>
                                   <?php endforeach; ?>
                               </tbody>
                           </table>
                       </div>
           </div>
       </div>
   </div>