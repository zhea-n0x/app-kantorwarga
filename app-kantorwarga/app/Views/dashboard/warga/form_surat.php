<div class="container-fluid px-lg-4">
    <div class="row">
        <div class="col-md-12 mt-lg-4 mt-4">
            <!-- Page Heading -->
            <div class="align-items-center justify-content-between mb-4">
                <center>
                    <h1 class="h3 mb-0 text-gray-800">Form Pengajuan Surat</h1>
                    <p>silahkan isi setiap data dengan benar !</p>
                </center>
            </div>
        </div>

        <!-- start form -->
        <div class="container mx-auto w-85 mt-3" style="margin-bottom: 90px;">
            <form action="/dashboardwarga/pengajuan_surat/proses_surat/generate" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Pengajuan Surat</label>
                    <select name="jenis" id="" class="form-control select2-js">
                        <?php if (is_array($jenis)) : ?>
                            <?php foreach ($jenis as $row) : ?>
                                <option value="<?= $row['kode_jenis']; ?>"><?= $row['jenis_surat']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Tujuan Pembuatan</label>
                    <input type="text" class="form-control" name="tujuan" placeholder="cth : pembuatan KTP / pindah domisili">
                </div>
                <button class="btn btn-primary"><i class="fas fa-upload"></i> Ajukan Surat</button>
                <!--<button class="btn btn-success shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i>
                    Buat Salinan</button>-->
            </form>
        </div>
        <!-- end form -->

    </div>

</div>