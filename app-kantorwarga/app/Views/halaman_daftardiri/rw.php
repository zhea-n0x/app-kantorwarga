<body>
    <div class="container mt-5 w-80">
        <h2 class="text-center">Konfigurasi Data Diri</h2>
        <p class="text-center">silahkan isi form sesuai dengan data diri yang tepat</p>
        <form action="<?= base_url('config_rw/data_pribadirw') ?>" method="POST" class="mx-auto mt-3">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="mb-2">NIK</label>
                    <input type="number" name='nik' class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="mb-2">No. KK</label>
                    <input type="number" name='no_kk' class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Nama Lengkap</label>
                    <input type="text" name='nama' class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="mb-2">Tempat</label>
                    <input type="text" name='tempat' class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="mb-2">Tanggal Lahir</label>
                    <input type="date" name='tgl_lahir' class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="mb-2">No. Telpon</label>
                    <input type="number" name='no_telp' class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="mb-2">Jenis Kelamin</label>
                    <select name="jk" id="" class="form-control" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="mb-2">Golongan Darah</label>
                    <select name="goldar" id="" class="form-control" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                        <option value="Belum Tahu">Belum Tahu</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="mb-2">Kode RT</label>
                    <select name="rt" id="" class="form-control">
                        <?php if (is_array($kd)) : ?>
                            <?php foreach ($kd as $row) : ?>
                                <option value="<?= $row['id_rt']; ?>"><?= $row['id_rt']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="mb-2">Blok Rumah</label>
                    <input type="text" name='blok' class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="mb-2">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="mb-2">Agama</label>
                    <select name="agama" id="" class="form-control" required>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="mb-2">Status Kawin</label>
                    <select name="skawin" id="" class="form-control" required>
                        <option value="Kawin">Kawin</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Lanjut</button>
        </form>
    </div>
</body>