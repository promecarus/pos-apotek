<?= $this->extend("app") ?>

<?= $this->section("link") ?>
<link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h1"><b><?= $_ENV["app.concept"] ?></b><?= $_ENV["app.theme"] ?></a>
        </div>
        <div class="card-body">
            <form id="form" action="/auth/login" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="emailOrUsername" class="form-control" placeholder="Email atau username" value="<?= old("emailOrUsername") ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            <p class="mb-0">
                Belum terdaftar?
                <a href="/auth/signup" class="text-center">Sign Up</a>
            </p>
        </div>
    </div>
</div>
<?= $this->include("component/formValidation") ?>
<?= $this->endSection() ?>
