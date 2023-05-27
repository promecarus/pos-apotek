<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div id="card-form" class="card">
            <div class="card-header">
                <h3 class="card-title">Form <?= $title ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form id="form" method="post">
                    <div class="input-group">
                        <input id="id" type="hidden" name="id">
                    </div>
                    <?= $this->renderSection("content") ?>
                    <div class="row">
                        <?php if (uri_string() != 'master/user') : ?>
                            <div class="col">
                                <button class="btn btn-primary btn-block" onclick="storeData()">Store</button>
                            </div>
                        <?php endif; ?>
                        <?php if (
                            ((uri_string() != 'master/pelanggan') && (uri_string() != 'transaksi/stok') && session()->get('role_id') < 3) ||
                            (session()->get('role_id')) < 3
                        ) : ?>
                            <div class="col">
                                <button class="btn btn-warning btn-block" onclick="updateData()">Update</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div id="card-table" class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel <?= $title ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped"></table>
            </div>
        </div>
    </div>
</div>
<?= $this->include("component/formValidation") ?>
<script>
    let data = <?= json_encode($dataTable) ?>,
        hiddenColumns = ['id', 'role_id', 'obat_id', 'kemasan_id', 'created_at', 'updated_at', 'deleted_at'],
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

            <?php if (session()->get('role_id') < 3) : ?>
                columns.push({
                    data: null,
                    title: 'action',
                    render: function(row) {
                        return `<div class="col">
                                    <div class="row">
                                        <div class="col"><button class="btn btn-warning btn-block" onclick="editData(${row.id})">Edit</button></div>
                                        <?php if (session()->get('role_id') < 2) : ?>
                                            <div class="col"><a class="btn btn-danger btn-block" href="/${type}/<?= strtolower($title) ?>/delete/${row.id}">Delete</a></div>
                                        <?php endif ?>
                                    </div>
                                </div>`
                    }
                })
            <?php endif ?>

            $("#table")
                .DataTable({
                    data: data,
                    columns: columns,
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    responsive: true,
                })
            <?php if (session()->get('role_id') < 3) : ?>
                    .buttons()
            <?php endif ?>
                .container()
                .appendTo("#table_wrapper .col-md-6:eq(0)")
        } else {
            $("#card-table").find(".card-body").html("<h3 class='text-center'>Tidak ada data</h3>")
        }
    })
</script>
<?= $this->endSection() ?>
