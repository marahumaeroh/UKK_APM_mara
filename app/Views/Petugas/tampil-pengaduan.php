<?= $this->extend('/dashboard') ?>
<?= $this->section('content') ?>
</br>
<h2>Data Pengaduan Masyarakat</h2></br>
<?php if (session()->getFlashdata('vrf')) : ?>
    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('vrf') ?></div>
<?php endif; ?>
<p>Berikut ini data Pengaduan dari Masyarakat.</p>
<table class="table table-sm table-striped">
    <thead class="bg-light text-center">
        <tr style="background-color:#E9967A;">
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Tanggal Masuk</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ListPengaduan as $key => $row) : ?>
            <tr align="center">
                <td><?= $key + 1 ?></td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tgl_pengaduan'] ?></td>
                <td><?= $row['status'] ?></td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="/pengaduan/validasi/<?= $row['id_pengaduan'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-sign-in-alt">Validasi </i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>