<?= $this->extend('layout/formTable') ?>

<?= $this->section('content') ?>
<label for="email">Email</label>
<div class="input-group mb-3">
    <input id="email" type="email" name="email" class="form-control" placeholder="Email">
</div>
<label for="username">Username</label>
<div class="input-group mb-3">
    <input id="username" type="text" name="username" class="form-control" placeholder="Username">
</div>
<label for="password">Password</label>
<div class="input-group mb-3">
    <input id="password" type="password" name="password" class="form-control" placeholder="Password">
</div>
<label for="nama">Nama</label>
<div class="input-group mb-3">
    <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama">
</div>
<div class="input-group mb-3">
    <label>Role</label>
    <select id="role_id" name="role_id" class="form-control select2" style="width: 100%;">
        <?php foreach ($role as $i) : ?>
            <option value="<?= $i['id'] ?>"><?= $i['role'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
<?= $this->endSection() ?>
