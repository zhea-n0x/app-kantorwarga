<?php

$jumlah = session()->getTempdata('jumlah');

?>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Konfigurasi Kepengurusan RT</h2>
        <p class="text-center">Isi dengan data yang tepat</p>
        <form action="<?= base_url('config_rt/pendataan_rt') ?>" method="POST" class="w-100 mx-auto mt-3">
            <label for="">Nama Ketua RT</label>
            <div class="">
                <input type="text" class="form-control" name="ketua">
            </div>
            <label for="" class="mt-2">Nomor Telpon</label>
            <div class="">
                <input type="text" class="form-control" name="no_telp">
            </div>
            <label for="" class="mt-2">No. Urut RT</label>
            <div class="">
                <input type="text" class="form-control" name="no_rt">
            </div>
            
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label hidden>Kode RT</label>
                    <input name="kode" class="form-control" value="<?= $kode; ?>" hidden readonly />
                </div>
                <div class="mb-3 col-md-12">
                    <label>Perangkat RT</label>
                    <select name="jumlah" id="jumlah" class="form-control" onchange="cekYa(this)">
                        <option value="">Pilih Ya, Jika Sekretaris/Bendahara RT Sudah Ada</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3" id="ifYes" style="display: none;">
                <div class="col-md-6">
                    <label for="">Nama Sekretaris</label>
                    <input type="text" class="form-control" name="sekretaris">
                </div>
                <div class="col-md-6">
                    <label for="">Nama Bendahara</label>
                    <input type="text" class="form-control" name="bendahara">
                </div>
            </div>
            

            <button class="btn btn-primary">Lanjut</button>
    </div>
    </form>
    </div>

</body>