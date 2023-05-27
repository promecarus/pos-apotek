<aside class="main-sidebar elevation-4 <?= (session()->get('theme') ? 'sidebar-dark-primary' : 'sidebar-light-primary') ?>">
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b><?= $_ENV["app.concept"] ?></b><?= $_ENV["app.theme"] ?></span></a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info"><a href="#"><?= session()->get("nama") ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link <?= uri_string() == '' ? 'active' : '' ?>"><i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?= explode("/", service('uri')->getPath())[0] == 'master' ? 'menu-open' : '' ?>"><a href="#" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Master<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('master/kemasan') ?>" class="nav-link <?= uri_string() == 'master/kemasan' ? 'active' : '' ?>"><i class="fas fa-box nav-icon"></i>
                                <p>Kemasan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('master/obat') ?>" class="nav-link <?= uri_string() == 'master/obat' ? 'active' : '' ?>"><i class="fas fa-pills nav-icon"></i>
                                <p>Obat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('master/pelanggan') ?>" class="nav-link <?= uri_string() == 'master/pelanggan' ? 'active' : '' ?>"><i class="fas fa-users nav-icon"></i>
                                <p>Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('master/user') ?>" class="nav-link <?= uri_string() == 'master/user' ? 'active' : '' ?>"><i class="fas fa-user nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= explode("/", service('uri')->getPath())[0] == 'transaksi' ? 'menu-open' : '' ?>"><a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Transaksi<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi/penjualan') ?>" class="nav-link <?= uri_string() == 'transaksi/penjualan' ? 'active' : '' ?>"><i class="fas fa-shopping-cart nav-icon"></i>
                                <p>Penjualan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi/stok') ?>" class="nav-link <?= uri_string() == 'transaksi/stok' ? 'active' : '' ?>"><i class="fas fa-boxes nav-icon"></i>
                                <p>Stok</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("auth/signout") ?>" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
