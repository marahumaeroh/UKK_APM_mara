<?= $this->include('Layout/Header'); ?>
<!-- Awal Konten Aplikasi -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-success" role="alert"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>

        <?php
        if (empty($intro)) {

            $this->renderSection('content');
        } else {
            echo $intro;
        }
        ?>

</main>
<?= $this->include('Layout/Footer'); ?>