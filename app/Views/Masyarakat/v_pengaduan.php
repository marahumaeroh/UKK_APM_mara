<?= $this->extend('Masyarakat/Dashboard') ?>
<?= $this->section('content') ?>

<div class="row">

    <!-- bagian kiri -->
    <!-- bagian kiri -->
    <div class="col-md-5">
        <!-- Success Upload -->

        <?php
        $errors = $validation->getErrors();
        if (!empty($errors)) {
            echo $validation->listErrors('my_list');
        }
        ?>
        </br>
        <p>Tulis Laporan Pengaduan</p></br>
        <?= form_open_multipart(base_url('/masyarakat/upload')); ?>
        <?php if (!empty(session()->getFlashdata('success'))) { ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php } ?>
        <?php if (!empty(session()->getFlashdata('msg'))) { ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('msg'); ?>
            </div>
        <?php } ?>

        <div class="form-group form-light text-danger">
            <input type="file" name="file_upload" id="">
            <p>Hanya diperbolehkan file: jpg,jpeg,png dan jfif</p>
            <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Pengaduan</label>
            <textarea name="txtInputPengaduan" class="form-control" rows="5" id="comment"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" style="background-color: #CD5C5C;" class="text-white">Kirim</button>
        </div>
        <?= form_close() ?>
    </div>

    <!-- bagian kanan -->
    <div class="col-md-7">
        </br>
        <p>Daftar Laporan tanggal <?= date('d M Y'); ?> :</p></br>
        <table class="table table-sm table-striped  table-bordered">
            <thead class="bg-light text-center">
                <tr class="warning" style="background-color: #CD5C5C;">
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $htmlData = null;
                $no = null;
                $total = null;
                foreach ($listPengaduan as $x) {
                    $no++;
                    $htmlData = '<tr>';
                    $htmlData .= '<td>' . $no . '.</td>';
                    $htmlData .= '<td>' . $x['nik'] . '</td>';
                    $htmlData .= '<td>' . $x['nama'] . '</td>';
                    $htmlData .= '<td>' . $x['tgl_pengaduan'] . '</td>';
                    $htmlData .= '<td>' . $x['status'] . '</td>';
                    $htmlData .= '<td class="text-center">';
                    $htmlData .= '<a href="/masyarakat/detail/' . $x['id_tanggapan'] . '" > Detail </a>';
                    $htmlData .= '</td>';
                    $htmlData .= '</tr>';
                    echo $htmlData;
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection(); ?>