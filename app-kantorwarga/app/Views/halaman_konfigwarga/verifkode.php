<body>
    <div class="container mt-5">
        <h2 class="text-center">Verifikasi Kode RT</h2>
        <p class="text-center">masukkan kode yang diberikan Ketua RT</p>
        <form action="<?= base_url('config_warga/verifikasi')?>" method="POST" class="w-100 mx-auto mt-3">
            <label>Kode RT</label>
            <input name="kode" class="form-control" placeholder="masukkan kode yang diberikan" required type="number"/>
            <button class="btn btn-primary mt-3">Lanjut</button>
        </form>
    </div>
</body>