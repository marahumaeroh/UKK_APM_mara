<?= $this->extend('/dashboard') ?>
<?= $this->section('content') ?>
</br>
<link rel="stylesheet" href="/css1/style.css">
<h2>Data Petugas</h2></br>
<?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('dlt')) : ?>
    <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('dlt') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('edt')) : ?>
    <div class="alert alert-info" role="alert"><?= session()->getFlashdata('edt') ?></div>
<?php endif; ?>
<p>Berikut ini daftar petugas pengelola aplikasi Pengaduan Masyarakat yang
    sudah terdaftar dalam database.</p>
<p><a href="/petugas/tambah" class="btn btn-primary btn-sm">Tambah Petugas</a></p>
<div class="table-responsive custom-table-responsive">
    <table class="table custom-table">
        <thead class="bg-dark text-center text-white">
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach ($ListPetugas as $key => $row) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $row['nama_petugas'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['level'] ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="/petugas/edit/<?= $row['id_petugas'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="/petugas/hapus/<?= $row['id_petugas'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>