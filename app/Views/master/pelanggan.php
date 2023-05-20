<?= $this->extend('layout/formTable') ?>

<?= $this->section('content') ?>
<label for="nama">Nama</label>
<div class="input-group mb-3">
    <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama">
</div>
<label for="alamat">Alamat</label>
<div class="input-group mb-3">
    <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
</div>
<label for="telepon">Telepon</label>
<div class="input-group mb-3">
    <input id="telepon" type="tel" name="telepon" class="form-control" placeholder="Telepon">
</div>
<?= $this->endSection() ?>
