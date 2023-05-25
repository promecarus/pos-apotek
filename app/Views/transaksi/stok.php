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
<div class="form-group">
    <label>Kedarluwarsa</label>
    <div id="kedarluwarsa" class="input-group date" data-target-input="nearest">
        <input name="kedarluwarsa" type="text" class="form-control datetimepicker-input" data-target="#kedarluwarsa" placeholder="Kedarluwarsa" />
        <div class="input-group-append" data-target="#kedarluwarsa" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
