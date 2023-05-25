<?= $this->extend('layout/formTable') ?>

<?= $this->section('content') ?>
<div class="input-group mb-3">
    <label>Obat</label>
    <select id="obat_id" name="obat_id" class="form-control select2" style="width: 100%;">
        <?php foreach ($obat as $i) : ?>
            <option value="<?= $i['id'] ?>"><?= $i['nama'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="input-group mb-3">
    <label>Kemasan</label>
    <select id="kemasan_id" name="kemasan_id" class="form-control select2" style="width: 100%;">
        <?php foreach ($kemasan as $i) : ?>
            <option value="<?= $i['id'] ?>"><?= $i['nama'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
<label for="jumlah">Jumlah</label>
<div class="input-group mb-3">
    <input id="jumlah" type="number" name="jumlah" class="form-control" placeholder="Jumlah">
</div>
<label for="kedarluwarsa">Kedarluwarsa</label>
<div class="input-group mb-3">
    <input id="kedarluwarsa" type="text" name="kedarluwarsa" class="form-control" placeholder="Kedarluwarsa" data-toggle="datetimepicker" />
</div>
<?= $this->endSection() ?>
