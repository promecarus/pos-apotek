<nav class="main-header navbar navbar-expand <?= (session()->get('theme') ? 'navbar-dark' : 'navbar-light') ?>">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("dashboard/themeSwitcher") ?>" role="button"><i class="fas <?= "fa-" . (session()->get('theme') ? "sun" : "moon") ?>"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button"><i class="fas fa-expand-arrows-alt"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("auth/signout") ?>" role="button"><i class="fas fa-sign-out-alt"></i></a>
        </li>
    </ul>
</nav>
