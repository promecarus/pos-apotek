<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <?php foreach ($infos as $key => $info) : ?>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-<?= $info['bg'] ?>">
                <div class="inner">
                    <h3><?= $info['value'] ?></h3>
                    <p><?= $key ?></p>
                </div>
                <div class="icon">
                    <i class="fas fa-<?= $info['icon'] ?>"></i>
                </div>
                <a href="<?= $info['link'] ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection() ?>
