<?= $this->extend('layout/formTable') ?>

<?= $this->section('content') ?>
<label for="angka">Angka</label>
<div class="input-group mb-3">
    <input id="angka" type="number" name="angka" class="form-control" placeholder="Angka">
</div>
<label for="satuan">Satuan</label>
<div class="input-group mb-3">
    <input id="satuan" type="text" name="satuan" class="form-control" placeholder="Satuan">
</div>
<label for="keterangan">Keterangan</label>
<div class="input-group mb-3">
    <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
</div>
<?= $this->endSection() ?>
