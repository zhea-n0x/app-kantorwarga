<body>
    <!--<?/*php
    echo "<pre>";
    print_r($corona);
    echo "</pre>";*/
        ?>-->
    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4 container">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <marquee behavior="" direction="" scrolldelay="75"><b>Informasi Corona Hari Ini</b> &nbsp;
                    <span class="text-success">Kasus Sembuh : <?= $corona['sembuh'] ?> Kasus</span>&nbsp;
                    <span class="text-warning">Dirawat : <?= $corona['dirawat'] ?> Kasus</span>&nbsp;
                    <span class="text-danger">Kasus Positif : <?= $corona['positif'] ?> Kasus</span>&nbsp;
                    <span class="text-dark">Kasus Meninggal : <?= $corona['meninggal'] ?> Kasus</span>
                </marquee>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard <?= $role ?></h1>
                    <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a>-->
                </div>
            </div>
            <!-- info rw-->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body mx-auto">
                                <!--<h5 class="card-title mb-4 text-center"> Informasi RW</h5>-->
                               <h1 class="display-5 mt-1 mb-3"><?= $wilayah['perumahan'] ?>, RT. <?= $rt['no_urut_rt'] ?></h1>
                                <div class="mb-1  text-center"> <i class="mdi mdi-arrow-bottom-right"></i>
                                    <span class="text-muted">Ketua RT : <?= $rt['ketua_rt'] ?></span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- info singkat -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="/dashboardrt/pengajuan_surat">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"><i class="fas fa-copy"></i> Surat</h5>
                                    <h1 class="display-5 mt-1 mb-3"><?= $pengajuan_all; ?> Pengajuan</h1>
                                    <div class="mb-1"> <i class="mdi mdi-arrow-bottom-right"></i>
                                        <span class="text-muted"><?= $pengajuan_acc; ?> Disetujui & <?= $pengajuan_dec ?> Ditolak</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--<div class="col-sm-3">
                        <div class="card">
                            <a href="/dashboardrw/data_rt">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"><i class="fas fa-cogs"></i> Rukun Tetangga</h5>

                                    <h1 class="display-5 mt-1 mb-3"><?= $jml_rt ?> RT Terdaftar</h1>
                                    <div class="mb-1">
                                        <span class="text-secondary"> <?= $jml_wilayah ?> </span>
                                        <span class="text-muted">Alamat Terdaftar</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>-->
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="fas fa-calendar-check"></i> Acara
                                    Terdekat</h5>
                                <h1 class="display-5 mt-1 mb-3">3</h1>
                                <div class="mb-1">
                                    <span class="text-secondary"> <i class="mdi mdi-arrow-bottom-right"></i> 2 </span>
                                    <span class="text-muted">Acara Umum</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <a href="/dashboardrw/data_warga">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"><i class="fas fa-users"></i> Jumlah Warga
                                    </h5>
                                    <h1 class="display-5 mt-1 mb-3"><?= $jml_warga ?> Warga</h1>
                                    <div class="mb-1">
                                        <span class="text-secondary"> <i class="mdi mdi-arrow-bottom-right"></i> <?= $jml_aktif ?> </span>
                                        <span class="text-muted">Akun Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>




            <!-- column -->
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Jadwal Ronda</h4>
                                <h5 class="card-subtitle mt-3">Bulan November Minggu Ke-3</h5>
                            </div>
                            <div class="ml-auto">
                                <div class="dl">
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
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="table-responsive">
                        <table class="table v-middle" id="myTable">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">Nama</th>
                                    <th class="border-top-0">Hari</th>
                                    <th class="border-top-0">Alamat</th>
                                    <th class="border-top-0">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a class="btn btn-circle btn-info text-white">AF</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Adam Firdaus</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Senin</td>
                                    <td>RT 4</td>
                                    <td>RT 4</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a class="btn btn-circle btn-orange text-white">DJ</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Donny Juniardy</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Senin</td>
                                    <td>RT 4</td>
                                    <td>RT 2</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a class="btn btn-circle btn-success text-white">AL</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Adithya Laksana</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Selasa</td>
                                    <td>RT 3</td>
                                    <td>RT 3</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a class="btn btn-circle btn-purple text-white">AS</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Ahmad Musyafi</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Kamis</td>
                                    <td>RT 4</td>
                                    <td>RT 4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


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