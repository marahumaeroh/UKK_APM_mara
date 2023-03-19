<?= $this->extend('/dashboard') ?>
<?= $this->section('content') ?>
</br>
<h2>Data Masyarakat</h2></br>
<link rel="stylesheet" href="/css1/style.css">
<?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('dlt')) : ?>
    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('dlt') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('edt')) : ?>
    <div class="alert alert-info" role="alert"><?= session()->getFlashdata('edt') ?></div>
<?php endif; ?>
<p>Berikut ini daftar masyarakat aplikasi Pelayanan Pengaduan yang
    sudah terdaftar dalam database.</p>
<p>
    <a href="/masyarakat/tambah" class="btn btn-primary
btn-sm">Tambah Masyarakat</a>
</p>
<div class="table-responsive custom-table-responsive">
    <table class="table custom-table">
        <thead class="bg-dark text-center text-white">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Nomor Telphone</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ListMasyarakat as $key => $row) : ?>
                <tr class="text-center">
                    <td><?= $key + 1 ?></td>
                    <td><?= $row['nik'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['telp'] ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="/masyarakat/edit/<?= $row['nik'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Anda Yakin Ingin Menghapus Ini?')" href="/masyarakat/hapus/<?= $row['nik'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>