<aside class="w-56 bg-base-100 rounded-br">
    <div class="z-20 bg-opacity-100 backdrop-blur sticky top-0 items-center gap-2 p-3 lg:flex">
        <?= $this->include('component/buttonapp') ?>
    </div>
    <ul class="menu menu-compact bg-base-100 w-full p-3">
        <li class="hover-bordered">
            <a href="<?= base_url() ?>" class="<?= uri_string() == '' ? 'active' : '' ?>"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        </li>
        <li class="menu-title"><span>Master</span></li>
        <li class="hover-bordered">
            <a href="<?= base_url('master/item1') ?>" class="<?= uri_string() == 'master/item1' ? 'active' : '' ?>"><i class="fa-solid fa-m"></i> Master Item 1</a>
        </li>
        <li class="hover-bordered">
            <a href="<?= base_url('master/item2') ?>" class="<?= uri_string() == 'master/item2' ? 'active' : '' ?>"><i class="fa-solid fa-m"></i> Master Item 2</a>
        </li>
        <li class="hover-bordered">
            <a href="<?= base_url('master/item3') ?>" class="<?= uri_string() == 'master/item3' ? 'active' : '' ?>"><i class="fa-solid fa-m"></i> Master Item 3</a>
        </li>
        <li class="menu-title"><span>Transaksi</span></li>
        <li class="hover-bordered">
            <a href="<?= base_url('transaksi/item1') ?>" class="<?= uri_string() == 'transaksi/item1' ? 'active' : '' ?>"><i class="fa-solid fa-t"></i> Transaksi 1</a>
        </li>
        <li class="menu-title"><span>Report</span></li>
        <li class="hover-bordered">
            <a href="<?= base_url('report/item1') ?>" class="<?= uri_string() == 'report/item1' ? 'active' : '' ?>"><i class="fa-solid fa-r"></i> Report</a>
        </li>
    </ul>
</aside>
