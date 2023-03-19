<?= $this->extend('/dashboard') ?>
<?= $this->section('content') ?>

<form action="/petugas/respon">
    <div class="form-group">
        <div class="col-md-6 pr-1">
            <div class="form-group">
                </br><label>NIK</label></br>
                <label class="form-control"><?= $detail[0]['nik']; ?></label>
            </div>
        </div>
        <div class="col-md-6 pr-1">
            <div class="form-group">
                <label class="font-weight-bold">Nama Masyarakat</label>
                <label class="form-control"><?= $detail[0]['nama']; ?></label>
            </div>
        </div>
        <div class="col-md-6 pr-1">
            <div class="form-group">
                <label class="font-weight-bold">Nama Petugas</label>
                <label class="form-control"><?= $detail[0]['nama_petugas']; ?></label>
            </div>
        </div>
        <div class="col-md-6 pr-1">
            <div class="form-group">
                <label class="font-weight-bold">Tanggal Masuk</label>
                <label class="form-control"><?= $detail[0]['tgl_pengaduan']; ?></label>
            </div>
        </div>
        <div class="col-md-6 pr-1">
            <div class="form-group">
                <label class="font-weight-bold">Tanggal Ditanggapi</label>
                <label class="form-control"><?= $detail[0]['tgl_tanggapan']; ?></label>
            </div>
        </div>
        <div class="col-md-6 pr-1">
            <label class="font-weight-bold">Foto : </label>
            <img src="/uploads/<?= $detail[0]['foto'] ?>" width="200">
        </div>
        <div class="col-md-6 pr-1">
            <div class="form-group">
                <label class="font-weight-bold">Laporan Pengaduan</label>
                <textarea name="txtInputPengaduan" class="form-control" rows="5" id="comment" readonly><?= $detail[0]['isi_laporan']; ?>
</textarea>
            </div>
        </div>
        <div class="col-md-6 pr-1">
            <div class="form-group">
                <label class="font-weight-bold">Respon</label>
                <textarea name="txtInputPengaduan" class="form-control" rows="5" id="comment" readonly><?= $detail[0]['isi_tanggapan']; ?>
</textarea>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" onclick="goBack()">Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </div>
</form>


<?= $this->endSection() ?>