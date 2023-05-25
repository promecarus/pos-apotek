<script>
    let data = <?= json_encode($dataTable) ?>,
        hiddenColumns = ['id', 'obat_id', 'kemasan_id', 'created_at', 'updated_at', 'deleted_at'],
        type = "<?= explode("/", uri_string())[0] ?>"

    function storeData() {
        $("#form")
            .attr("action", `/${type}/<?= strtolower($title) ?>/store`)
            .submit()
    }

    function editData(id) {
        var item = data.find((row) => row.id == id)
        <?php foreach ($fields as $field) : ?>
            <?php if ($field == 'kedarluwarsa') : ?>
                $("#<?= $field ?>").datetimepicker('date', item.<?= $field ?>)
            <?php else : ?>
                $("#<?= $field ?>").val(item.<?= $field ?>).trigger('change')
            <?php endif ?>
        <?php endforeach ?>
    }

    function updateData() {
        if (!$("#id").val()) {
            $("#card-form").find(".card-body").prepend(`
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Pilih data yang akan diupdate terlebih dahulu di tabel!
                    <button class="close" data-dismiss="alert">
                        <span>x</span>
                    </button> 
                </div>
            `)
            event.preventDefault()
        } else {
            $("#form")
                .attr("action", `/${type}/<?= strtolower($title) ?>/update/${$("#id").val()}`)
                .submit()
        }
    }

    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        $('#kedarluwarsa').datetimepicker({
            locale: 'id',
            format: 'll',
        })

        if (data.length > 0) {
            var keys = Object.keys(data[0])
            var columns = keys.map(function(key) {
                var column = {
                    data: key,
                    title: key
                }
                if (hiddenColumns.includes(key)) {
                    column.visible = false
                }
                return column
            })

            columns.push({
                data: null,
                title: 'action',
                render: function(row) {
                    return `
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-warning btn-block" onclick="editData(${row.id})">Edit</button>
                                </div>
                                <div class="col">
                                    <a class="btn btn-danger btn-block" href="/${type}/<?= strtolower($title) ?>/delete/${row.id}">Delete</a>
                                </div>
                            </div>
                        </div>
                    `;
                }
            });

            $("#table")
                .DataTable({
                    data: data,
                    columns: columns,
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    responsive: true,
                })
                .buttons()
                .container()
                .appendTo("#table_wrapper .col-md-6:eq(0)")
        } else {
            $("#card-table").find(".card-body").html("<h3 class='text-center'>Tidak ada data</h3>")
        }
    })
</script>
