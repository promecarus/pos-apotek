<div class="hidden"></div>
<div id="notification" class="toast toast-end">
    <?php if (session()->getFlashdata('message_error')) : ?>
        <span class="alert alert-error"><i class="fa-solid fa-circle-exclamation"></i> <?= session()->getFlashdata('message_error') ?></span>
    <?php elseif (session()->getFlashdata('message_success')) : ?>
        <span class="alert alert-success"><i class="fa-solid fa-circle-check"></i> <?= session()->getFlashdata('message_success') ?></span>
    <?php elseif (session()->getFlashdata('message_warning')) : ?>
        <span class="alert alert-warning"><i class="fa-solid fa-triangle-exclamation"></i> <?= session()->getFlashdata('message_warning') ?></span>
    <?php endif; ?>
</div>
