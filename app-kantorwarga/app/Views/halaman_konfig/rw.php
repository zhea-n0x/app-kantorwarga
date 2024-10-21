<body>
    <div class="container mt-5">
        <h2 class="text-center">Konfigurasi Kepengurusan RW</h2>
        <p class="text-center">silahkan screenshot, dan bagikan kode ke setiap Ketua RT yang sesuai</p>
        <form action="<?= base_url('config_rw/pendataan_rt')?>" method="POST" class="w-100 mx-auto mt-3">
            <label>Jumlah RT</label>
            <input name="jumlah" id="jumlah" class="form-control" placeholder="masukkan jumlah RT" required type="number" min="1" max="10"/>
            <div id="boxquantity"></div>
            <button class="btn btn-primary mt-3">Lanjut</button>
        </form>
    </div>
</body>