<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="drawer drawer-mobile">
    <input id="drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <?= $this->include('component/navbar') ?>
        <div class="p-5">
            <h1 class="text-3xl mb-5"><?= $title ?? 'Not Set' ?></h1>
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <div class="drawer-side">
        <label for="drawer" class="drawer-overlay"></label>
        <?= $this->include('component/sidebar') ?>
    </div>
</div>
<?= $this->endSection() ?>
