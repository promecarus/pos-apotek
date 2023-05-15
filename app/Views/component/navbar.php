<div class="sticky top-0">
    <nav class="navbar shadow-2xl rounded-b-2xl lg:rounded-bl-none flex justify-between">
        <div>
            <label for="drawer" class="btn btn-square btn-ghost drawer-button lg:hidden"><i class="fa-solid fa-bars fill-current"></i></label>
            <div class="lg:hidden">
                <?= $this->include('component/buttonapp') ?>
            </div>
        </div>
        <div>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="avatar placeholder btn btn-ghost btn-circle">
                    <div class="bg-neutral-focus text-neutral-content rounded-full w-12"><?= !empty($nama = session()->get('nama')) ? substr(strtok($nama, ' '), 0, 1) . substr(strrchr($nama, ' '), 1, 1) : '' ?></div>
                </label>
                <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                    <li><a href="#"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li></li>
                    <li><a href="/auth/signout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
