<?= $this->extend('layout/formTable') ?>

<?= $this->section('content') ?>
<label for="nama">Nama</label>
<div class="input-group mb-3">
    <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama">
</div>
<label for="keterangan">Keterangan</label>
<div class="input-group mb-3">
    <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
</div>
<?= $this->endSection() ?>
