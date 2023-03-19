<?= $this->extend('dashboard') ?>
<?= $this->section('content') ?>
</br>
<h2>Penambahan Data Masyarakat</h2></br>
<p>Silahkan gunakan form dibawah ini untuk mendata Masyarakat baru.</p>
<form method="POST" action="/masyarakat/simpan">
    <div class="form-group">
        <label class="font-weight-bold">Nik</label>
        <input type="text" name="txtInputNik" class="form-control" placeholder="Masukan NIK" autocomplete="off" autofocus>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Nama Lengkap</label>
        <input type="text" name="txtInputNama" class="form-control" placeholder="Masukan nama lengkap" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">No Telphone</label>
        <input type="tel" id="phone" name="txtInputTlp" class="form-control" placeholder="Masukan no telphone" autocomplete="off">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>

    </div>
</form>
<?= $this->endSection() ?>