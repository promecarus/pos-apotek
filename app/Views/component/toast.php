<div id="notification" class="toast toast-top toast-end">
    <?php if (session()->getFlashdata('message_error')) : ?>
        <span class="alert alert-error"><?= session()->getFlashdata('message_error') ?></span>
    <?php elseif (session()->getFlashdata('message_success')) : ?>
        <span class="alert alert-success"><?= session()->getFlashdata('message_success') ?></span>
    <?php elseif (session()->getFlashdata('message_warning')) : ?>
        <span class="alert alert-warning"><?= session()->getFlashdata('message_warning') ?></span>
    <?php endif; ?>
</div>
