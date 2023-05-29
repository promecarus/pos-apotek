<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 col-lg-3">
        <div id="card-form-pembelian" class="card">
            <div class="card-header">
                <h3 class="card-title">Form Pembelian</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form id="form-pembelian" method="post">
                    <div class="input-group mb-3">
                        <label>Stok</label>
                        <select id="stok_id" name="stok_id" class="form-control select2" style="width: 100%;">
                            <?php foreach ($stok as $i) : ?>
                                <option value="<?= $i['id'] ?>"><?= $i['stok'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="jumlah">Jumlah</label>
                    <div class="input-group mb-3">
                        <input id="jumlah" type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <button class="btn btn-primary btn-block" onclick="$('#form-pembelian').attr('action', '/transaksi/temp-pembelian/submit').submit()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-9">
        <div id="card-table-pembelian" class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Pembelian</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="table-pembelian" class="table table-bordered table-striped"></table>
                <table id="example1" class="table table-bordered table-striped"></table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div id="card-form-penjualan" class="card">
            <div class="card-header">
                <h3 class="card-title">Form Penjualan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form id="form-penjualan" method="post">
                    <div class="input-group">
                        <input id="id" type="hidden" name="id">
                    </div>
                    <div class="input-group mb-3">
                        <label>Pelanggan</label>
                        <select id="pelanggan_id" name="pelanggan_id" class="form-control select2" style="width: 100%;">
                            <?php foreach ($pelanggan as $i) : ?>
                                <option value="<?= $i['id'] ?>"><?= $i['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label for="total">Total</label>
                            <div class="input-group mb-3">
                                <input id="total" name="total" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="bayar">Bayar</label>
                            <div class="input-group mb-3">
                                <input id="bayar" type="number" name="bayar" class="form-control" placeholder="Bayar">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="kembalian">Kembalian</label>
                            <div class="input-group mb-3">
                                <input id="kembalian" name="kembalian" class="form-control" placeholder="Kembalian" readonly>
                            </div>
                        </div>
                        <input id="pembelian" type="hidden" name="pembelian">
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <button class="btn btn-success btn-block" onclick="storeData()">Process</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <a class="btn btn-warning btn-block" href="/transaksi/temp-pembelian/reset">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div id="card-table-penjualan" class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel <?= $title ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="table-penjualan" class="table table-bordered table-striped"></table>
            </div>
        </div>
    </div>
</div>
<script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/plugins/jquery-validation/additional-methods.min.js"></script>
<script>
    let data = <?= json_encode($tableTempPembelian) ?>,
        hiddenColumns = ['id', 'role_id', 'obat_id', 'kemasan_id', 'stok_id', 'created_at', 'updated_at', 'deleted_at']

    function formValidation(idForm, rules, messages) {
        $(idForm).validate({
            rules: rules,
            messages: messages,
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
    }

    let tempPembelian = JSON.stringify(data)

    function storeData() {
        $('#pembelian').val(tempPembelian)
        $('#form-penjualan')
            .attr('action', '/transaksi/penjualan/store')
            .submit()
    }

    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        $('#total').val(data
            .reduce((a, b) => a + (b['jumlah'] * b['harga']), 0)
        )

        $('#bayar').on('input', function() {
            $('#kembalian').val(parseInt($(this).val()) - parseInt($('#total').val()))
        })

        formValidation("#form-pembelian", {
            jumlah: {
                number: true,
                required: true,
            },
        }, {
            jumlah: {
                number: "Jumlah harus berupa angka",
                required: "Jumlah tidak boleh kosong",
            },
        })

        formValidation("#form-penjualan", {
            bayar: {
                number: true,
                required: true,
                min: parseFloat($("#total").val())
            },
            total: {
                number: true,
                required: true,
                min: 1
            },
        }, {
            bayar: {
                number: "Bayar harus berupa angka",
                required: "Bayar tidak boleh kosong",
                min: "Bayar tidak boleh kurang dari total"
            },
            total: {
                number: "Total harus berupa angka",
                required: "Total tidak boleh kosong",
                min: "Total tidak boleh kurang dari 1"
            },
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
                title: 'total',
                render: function(row) {
                    return row.jumlah * row.harga
                }
            })

            let tablePembelian = $("#table-pembelian")
                .DataTable({
                    data: data,
                    columns: columns,
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
                })
                .buttons()
                .container()
                .appendTo("#table-pembelian_wrapper .col-md-6:eq(0)")
        } else {
            $("#card-table-pembelian").find(".card-body").html("<h3 class='text-center'>Tidak ada data</h3>")
        }

        data = <?= json_encode($tablePenjualan) ?>

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
                                    <a class="btn btn-info btn-block" href="/transaksi/penjualan/invoice/${row.id}" target="_blank">Invoice</a>
                                </div>
                                <div class="col">
                                    <a class="btn btn-danger btn-block" href="/transaksi/penjualan/delete/${row.id}">Delete</a>
                                </div>
                            </div>
                        </div>
                    `
                }
            })

            $("#table-penjualan")
                .DataTable({
                    data: data,
                    columns: columns,
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
                })
                .buttons()
                .container()
                .appendTo("#table-penjualan_wrapper .col-md-6:eq(0)")
        } else {
            $("#card-table-penjualan").find(".card-body").html("<h3 class='text-center'>Tidak ada data</h3>")
        }
    })
</script>
<?= $this->endSection() ?>
