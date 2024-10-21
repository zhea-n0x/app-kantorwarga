<body>




    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Data Warga</h1>
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
                                        <th>Nama</th>
                                        <th>TTL</th>
                                        <th>Alamat</th>
                                        <th>RT</th>
                                        <th>Nomor HP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Akun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($warga as $row) :
                                    ?>

                                        <tr class="text-center">
                                            <td><?= $row['nama_lengkap']; ?></td>
                                            <td><?= $row['tempat']; ?> / <?= $row['tgl_lahir']; ?></td>
                                            <td><?= $row['blok_rumah']; ?> </td>
                                            <td>RT <?= $row['no_urut_rt'] ?></td>
                                            <td><?= $row['no_telp']; ?></td>
                                            <td><?= $row['jenis_kelamin']; ?></td>
                                            <td><?php echo $row['isActive'] == '1' ? 'Aktif' : 'Tidak Aktif'; ?></td>
                                            <td>
                                                <a href="/FlowdataRT/hapusWarga/<?= $row['id_warga'] ?>" type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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