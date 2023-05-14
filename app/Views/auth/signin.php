<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="flex justify-center items-center h-screen">
    <div class="card shadow-lg p-6 w-96">
        <h2 class="text-xl font-semibold mb-3">Sign In</h2>
        <form method="post" action="/auth/login" class="form-control w-full mb-3">
            <div class="input-group input-group-vertical mb-3">
                <input class="input input-bordered" name="emailOrUsername" placeholder="Email or username" type="text" value="<?= old('emailOrUsername ') ?>">
                <input class="input input-bordered" name="password" placeholder="Password" type="password">
            </div>
            <button class="btn w-full" type="submit">Submit</button>
        </form>
        <p class="text-center text-sm text-gray-500">
            Belum terdaftar?
            <a href="/auth/signup" class="link link-info link-hover">Sign Up</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>
