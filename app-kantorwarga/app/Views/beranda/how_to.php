<body class="wrap home-bg" scroll="no">
    <div class="content">
        <nav class="navbar navbar-light justify-content-between sticky-top">
            <a class="navbar-brand ml-5 mt-3">
                <img src="/resources/images/logo/icon.png" alt="" height="72" width="72">
            </a>
            <button class="btn btn-warning my-2 my-sm-0 mr-5" type="submit"><a href="<?= base_url('/'); ?>" class="text-light">Beranda</a></button>
        </nav>
        <div class="container mt-3 text-center">
            <h1>Cara Penggunaan Aplikasi</h1>
            <!-- Keterangan -->
            <div class="row mt-1 mx-auto">
                <div class="col-md-12">
                    <div class="card mx-auto mt-3 w-75">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Sebelumnya, pastikan kalian sudah memiliki tempat untuk menghosting aplikasi ini</li>
                            <li class="list-group-item text-dark">Download file aplikasi <a href="" class="text-dark"><u>disini</u></a></li>
                            <li class="list-group-item">Upload file yang sudah didownload ke hostingan, dan ekstrak file tersebut</li>
                            <li class="list-group-item">Upload database melalui panel <i>phpmyadmin</i></li>
                            <li class="list-group-item">Lalu konfigurasi awal dengan mengakses url "hostname.com/login"</li>
                        </ul>
                    </div>
                    <div class="admin-call mb-4" style="margin-top: -10px;">
                        <h5>merasa kesulitan ?</h5>
                        <button class="btn btn-success mt-2" type="submit"><a href="<?= base_url('/'); ?>" class="text-light">Hubungi Admin</a></button>
                    </div>
                </div>
            </div>
            <!-- End-Keterangan -->
        </div>
    </div>
</body>