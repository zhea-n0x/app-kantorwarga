<body class="wrap home-bg" scroll="no">
    <div class="content">
        <nav class="navbar navbar-light justify-content-between sticky-top">
            <a class="navbar-brand ml-5 mt-3">
                <img src="/resources/images/logo/icon.png" alt="" height="72" width="72">
            </a>
            <div class="dropdown show mr-3">
                <a class="btn btn-warning dropdown-toggle btn-lg text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Daftar
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?= base_url('config_rw') ?>">RW</a>
                    <a class="dropdown-item" href="<?= base_url('config_rt/verifikasi_kode')?>">RT</a>
                    <a class="dropdown-item" href="<?= base_url('config_warga/verifikasi_kode')?>">Warga</a>
                </div>
            </div>
        </nav>
        <div class="container" style="margin-top: 90px;">
            <center>
                <h2 class="col-md-9"><b>Informasi Warga, Administrasi RT/RW dengan Mudah, dan Fitur Lainnya.</b></h2>
                <h4 class="mt-3">Akses di manapun. Ajukan surat kapan pun.</h4>
                <p class="mt-4 font-weight-light">Anda Seorang RW dan tertarik ? Lihat Tutorial Pemasangannya !</p>
                <div class="mx-auto">
                    <div class="mt-3">
                        <button class="btn btn-success" type="submit"><a href="<?= base_url('login'); ?>" class="text-light">Cek Video</a></button>
                        <p>atau</p>
                        <button class="btn btn-warning btn-lg" type="submit"><a href="<?= base_url('login'); ?>" class="text-light">Login</a></button>
                    </div>
                </div>
            </center>
        </div>
    </div>
</body>
<a href="<?= base_url('home/how_to'); ?>" class="text-light">Cara Penggunaan</a>