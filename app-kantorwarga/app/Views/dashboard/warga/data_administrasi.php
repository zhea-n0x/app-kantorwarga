<body>




    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Pengajuan Surat</h1>
                </div>
            </div>

            <!-- start table -->
            <div class="container">
                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex align-items-center">
                                <!--<div class="ml-auto">
                                                    <div class="dl">
                                                        <div class="form">
                                                            <input type='text' id='input' onkeyup='searchTable()' class="bg-light form-control" placeholder="cari data...">
                                                        </div>
                                                        <hr>
                                                        <select class="custom-select" style="width:100%;" id="mySelector">
                                                            <option value="0">Tampilkan Semua</option>
                                                            <option value="Senin">Senin</option>
                                                            <option value="Selasa">Selasa</option>
                                                            <option value="Rabu">Rabu</option>
                                                            <option value="Kamis">Kamis</option>
                                                            <option value="Jum'at">Jum'at</option>
                                                            <option value="Sabtu">Sabtu</option>
                                                            <option value="Minggu">Minggu</option>
                                                        </select>
                                                    </div>
                                                </div>-->
                            </div>
                            <!-- title -->
                        </div>
                        <div class="table-responsive mx-auto">
                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis Surat</th>
                                        <th class="text-center">Keperluan</th>
                                        <th class="text-center">Status Persetujuan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($surat as $row) :
                                    ?>

                                        <tr class="text-center">
                                            <td><?= $row['nama_lengkap']; ?></td>
                                            <td><?= $row['jenis_surat']; ?></td>
                                            <td><?= ucfirst($row['keperluan']); ?></td>
                                            <td>
                                                <?php
                                                if ($row['status_rt'] == 0 && $row['status_rw'] == 0){
                                                    echo 'Menunggu Konfirmasi RT';
                                                }elseif ($row['status_rt'] == 1 && $row['status_rw'] == 0) {
                                                    echo 'Telah Disetujui RT';
                                                } elseif ($row['status_rt'] == 1 && $row['status_rw'] == 1) {
                                                    echo 'Telah Disetujui Penuh';
                                                } elseif ($row['status_rt'] == 2 || $row['status_rw' == 2]) {
                                                    echo 'Pengajuan Ditolak';
                                                } else {
                                                    echo 'Tidak Ada Data';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#view<?= $row['id_surat'] ?>"><i class="fas fa-file"></i> Lihat Dokumen</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!--Modal View-->
                            <?php
                            foreach ($surat as $row) :
                            ?>
                                <div class="modal fade" id="view<?= $row['id_surat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered align-center" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><?= $row['jenis_surat'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="<?= base_url('administrasi/surat_warga/' . $row['file_surat'] . '') ?>" frameborder="0" height="500" width="450"></iframe>
                                            </div>
                                            <div class="modal-footer align-center">
                                                <a type="button" data-target="#download<?= $row['id_surat']?>" data-toggle="modal" data-dismiss="modal" class="btn btn-primary text-light">Setujui &nbsp;<i class="fas fa-check"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- Modal Comment Setuju -->
                            <?php foreach ($surat as $row) : ?>
                                <div class="modal fade" id="download<?= $row['id_surat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered align-center" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Berikan Keterangan Lebih Lanjut</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/FlowdataRT/setuju/" method="POST">
                                                    <input type="text" readonly value="<?= $row['id_surat']; ?>" hidden name="id">
                                                    <label for="">Keterangan</label>
                                                    <textarea name="komen" id="" cols="30" rows="10" style="border:2px solid grey; border-radius: 10px; width:100%"></textarea>
                                                    <button type="submit" class="btn btn-primary text-light">Setujui</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Modal Comment Tolak -->
                            <?php foreach ($surat as $row) : ?>
                                <div class="modal fade" id="comment<?= $row['id_surat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered align-center" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Berikan Alasan Pertidak Setujuan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/FlowdataRT/tolak/" method="POST">
                                                    <input type="text" readonly value="<?= $row['id_surat']; ?>" hidden name="id">
                                                    <label for="">Alasan</label>
                                                    <textarea name="komen" id="" cols="30" rows="10" style="border:2px solid grey; border-radius: 10px; width:100%"></textarea>
                                                    <button type="submit" class="btn btn-danger text-light">Tolak</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end table -->

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>








    <footer class="footer">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-6 text-left">
                    <p class="mb-0">
                        <a href="index.html" class="text-muted"><strong>SandBox Team
                            </strong></a> &copy 2020
                    </p>
                </div>
                <div class="col-6 text-right">
                    <ul class="list-inline">
                        <li class="footer-item">
                            <a class="text-muted" href="#">Support</a>
                        </li>
                        <li class="footer-item">
                            <a class="text-muted" href="#">Help Center</a>
                        </li>
                        <li class="footer-item">
                            <a class="text-muted" href="#">Privacy</a>
                        </li>
                        <li class="footer-item">
                            <a class="text-muted" href="#">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->










</body>