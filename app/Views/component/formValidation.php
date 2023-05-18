<script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/plugins/jquery-validation/additional-methods.min.js"></script>
<script>
    $(function() {
        $("#form").validate({
            rules: <?= $rules ?>,
            messages: <?= $messages ?>,
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback")
                element.closest(".input-group").append(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid")
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid")
            }
        })
    })
</script>
