<?= $this->extend("app") ?>

<?= $this->section("link") ?>
<link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h1"><b><?= $_ENV["app.concept"] ?></b><?= $_ENV["app.theme"] ?></a>
        </div>
        <div class="card-body">
            <form id="form" action="/auth/register" method="post">
                <div class="input-group mb-3">
                    <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" value="<?= old('username') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-at"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" value="<?= old('password') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi password" value="<?= old('confirm_password') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= old('nama') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </div>
                </div>
            </form>
            <p class="mb-0">
                Sudah terdaftar?
                <a href="/auth/signin" class="text-center">Sign In</a>
            </p>
        </div>
    </div>
</div>
<?= $this->include("component/formValidation") ?>
<?= $this->endSection() ?>
