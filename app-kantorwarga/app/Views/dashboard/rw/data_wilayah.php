<body>




    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Informasi Wilayah</h1>
                </div>
            </div>

            <!-- start table -->
            <div class="container">
                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="card-body w-100">
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
                        <div class="table-responsive mx-auto ">
                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Perumahan</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($wilayah as $row) :
                                    ?>

                                        <tr class="text-center">
                                            <td><?= $row['perumahan']; ?></td>
                                            <td><?= $row['kecamatan']; ?> </td>
                                            <td><?= $row['kelurahan'] ?></td>
                                            <td><?= $row['kota']; ?></td>
                                            <td><?= $row['provinsi']; ?></td>
                                            <td><?= $row['lat']; ?></td>
                                            <td><?= $row['lng']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="showmap" style="height:500px" class="mb-3"></div>
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
    <?php
    foreach ($wilayah as $row) :
    ?>
        <script>
            var mymap = L.map('showmap').setView([<?= $row['lat'] ?>, <?= $row['lng'] ?>], 13);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

            var marker = L.marker([<?= $row['lat'] ?>, <?= $row['lng'] ?>]).addTo(mymap);
            var popup = marker.bindPopup('<b><center><?= $row['perumahan'] ?></center></b><br /> Kel. <?= $row['kelurahan'] ?>, Kec. <?= $row['kecamatan'] ?>');
            popup.openPopup();
        </script>
    <?php endforeach; ?>








</body>