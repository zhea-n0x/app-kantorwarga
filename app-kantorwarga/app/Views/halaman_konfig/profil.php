<?php

//$jumlah = session()->getTempdata('jumlah');
$kode = session()->getTempdata('kode');

?>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Konfigurasi Kepengurusan RW</h2>
        <p class="text-center">Isi dengan data yang tepat</p>
        <form action="<?= base_url('config_rw/pendataan_rw') ?>" method="POST" class="w-100 mx-auto mt-3">
            <label for="">Nama Ketua RW</label>
            <div class="">
                <input type="text" class="form-control" name="ketua">
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label hidden>Jumlah RT</label>
                    <input name="jml" class="form-control" value="" hidden readonly />
                    
                    <?php 
                    //echo $jumlah;
                    
                    echo "<pre>";
                    print_r ($kode);
                    echo "</pre>";
                    
                    ?>
                </div>
                <div class="mb-3 col-md-12">
                    <label>Perangkat RW</label>
                    <select name="jumlah" id="jumlah" class="form-control" onchange="cekYa(this)">
                        <option value="">Pilih Ya, Jika Sekretaris/Bendahara RW Sudah Ada</option>
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
            <div class="row mb-2">
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput">Provinsi</label>
                    <select name="nama_provinsi" id="" class="form-control js-example-basic-single">

                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput">Kota/Kabupaten</label>
                    <select name="nama_kota" id="" class="form-control js-example-basic-single">

                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput">Kecamatan</label>
                    <select name="nama_kecamatan" id="" class="form-control js-example-basic-single">

                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput">Kelurahan</label>
                    <select name="nama_kelurahan" id="" class="form-control js-example-basic-single">

                    </select>
                </div>
            </div>
            <div class="mb-1">
                <label for="">Alamat</label>
                <small class="text-muted">jika perumahan tidak tepat, tandai pada bangunan yang sesuai di perumahan pada peta. </small>
            </div>
            <div class="mb-3">
                <div id="mapid" style="height:500px" class="mb-3"></div>
                <div class="">
                    <label for="">Perumahan</label>
                    <input class="form-control" type="text" placeholder="cth : Perum Botania Raya" name="nama_perumahan">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="">Latitude</label>
                    <input type="text" class="form-control" name="lat" readonly id="lat">
                </div>
                <div class="col-md-6">
                    <label for="">Longitude</label>
                    <input type="text" class="form-control" name="long" readonly id="long">
                </div>
            </div>

            <button class="btn btn-primary mt-3">Lanjut</button>
    </div>
    </form>
    </div>

</body>