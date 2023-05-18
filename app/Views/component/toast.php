<?php if (session()->has('message')) : ?>
<script src="/plugins/toastr/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        var message = '<?= session('message') ?>'
        var type = '<?= session('type') ?>'

        toastr.options = {
            progressBar: true,
            positionClass: 'toast-top-right',
            showDuration: '300',
            hideDuration: '1000',
            timeOut: '5000',
            extendedTimeOut: '1000'
        }

        if (type === 'success') toastr.success(message)
        if (type === 'error') toastr.error(message)
        if (type === 'info') toastr.info(message)
        if (type === 'warning') toastr.warning(message)
    })
</script>
<?php endif ?>
