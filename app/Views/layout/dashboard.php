<?= $this->extend("app") ?>
<?= $this->section("link") ?>
<link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="wrapper">
    <?= $this->include("component/navbar") ?>
    <?= $this->include("component/sidebar") ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $title ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <?= $this->renderSection("content") ?>
            </div>
        </section>
        <?= $this->include("component/footer") ?>
    </div>
</div>
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<?= $this->endSection() ?>
