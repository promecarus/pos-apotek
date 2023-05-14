<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('message_error')) : ?>
    <div class="toast toast-top toast-end">
        <span class="alert alert-error"><?= session()->getFlashdata('message_error') ?></span>
    </div>
<?php endif; ?>

<div class="flex justify-center items-center h-screen">
    <div class="card shadow-lg p-6 w-96">
        <h2 class="text-xl font-semibold mb-3">Sign Up</h2>
        <form method="post" action="/auth/register" class="form-control w-full mb-3">
            <input class="input input-bordered" name="email" placeholder="Email" type="text" value="<?= old('email') ?>">
            <span class="label label-text-alt text-error"><?= session()->getFlashdata('errors')['email'] ?? '' ?></span>

            <input class="input input-bordered" name="username" placeholder="Username" type="text" value="<?= old('username') ?>">
            <span class="label label-text-alt text-error"><?= session()->getFlashdata('errors')['username'] ?? '' ?></span>

            <input class="input input-bordered" name="password" placeholder="Password" type="password" value="<?= old('password') ?>">
            <span class="label label-text-alt text-error"><?= session()->getFlashdata('errors')['password'] ?? '' ?></span>

            <input class="input input-bordered" name="confirm_password" placeholder="Konfirmasi password" type="password" value="<?= old('confirm_password') ?>">
            <span class="label label-text-alt text-error"><?= session()->getFlashdata('errors')['confirm_password'] ?? '' ?></span>

            <input class="input input-bordered" name="nama" placeholder="Nama" type="text" value="<?= old('nama') ?>">
            <span class="label label-text-alt text-error"><?= session()->getFlashdata('errors')['nama'] ?? '' ?></span>

            <button class="btn w-full" type="submit">Submit</button>
        </form>
        <p class="text-center text-sm text-gray-500">
            Sudah terdaftar?
            <a href="/auth/signin" class="link link-info link-hover">Sign In</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>
