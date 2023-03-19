<?= $this->extend('/dashboard') ?>
<?= $this->section('content') ?>

<form method="POST" action=" /petugas/tanggapan ">
    <div class="form-group">
        <input type="hidden" name="txtId" class="form-control" value="<?= $detail[0]['id_pengaduan']; ?>" readonly>
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
                    <label class="font-weight-bold">Tanggal Masuk</label>
                    <label class="form-control"><?= $detail[0]['tgl_pengaduan']; ?></label>
                </div>
            </div>
            <div class="col-md-6 pr-1">
                <div class="form-group">
                    <label class="font-weight-bold">Foto</label>
                    <img src="/uploads/<?= $detail[0]['foto'] ?>" width="150">
                </div>
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
                    <label class="font-weight-bold">Status</label>

                    <?php
                    if ($detail[0]['status'] == "proses") { ?>

                        <select name="selectStatus" class="form-control">
                            <option <?= $detail[0]['status'] == 'proses' ?
                                        'selected' : null; ?> value="proses">Proses</option>
                            <option <?= $detail[0]['status'] == 'reject' ?
                                        'selected' : null; ?> value="reject">DiTolak</option>
                            <option <?= $detail[0]['status'] == 'selesai' ?
                                        'selected' : null; ?> value="selesai">Selesai</option>
                        <?php    } else { ?>
                            <br>
                            <div class="col-md-15 pr-1">
                                <div class="form-group">
                                    <label class="form-control">Selesai</label>
                                </div>
                            </div>

                        <?php    } ?>
                        </select>
                </div>
            </div>
            <div class="form-group">
                <?php
                if ($detail[0]['status'] == "proses") { ?>
                    <label for="area">Tanggapan</label>
                    <br>
                    <textarea id="area" name="tanggapan" class="form-control" rows="5"></textarea>
                <?php    } ?>
                <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
            </div>
            <?php
            if ($detail[0]['status'] == "proses") { ?>
                <div class="form-group">
                    <button class="btn btn-primary"> verifikasi </button>
                </div>
            <?php    } ?>
</form>


<?= $this->endSection() ?>