<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Apotek | Invoice Print</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> <?= "{$_ENV['app.concept']} {$_ENV['app.theme']}" ?>
                        <small class="float-right"><?= date("d/m/Y H:i:s", strtotime($tanggal)) ?></small>
                    </h2>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <table>
                        <tr>
                            <th>Kasir</th>
                            <td>:</td>
                            <td><?= $kasir ?></td>
                        </tr>
                        <tr>
                            <th>Pelanggan</th>
                            <td>:</td>
                            <td><?= $pelanggan ?></td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Obat</th>
                                <th>Kemasan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (json_decode($pembelian, true) as $i) : ?>
                                <tr>
                                    <td><?= $i['nama'] ?></td>
                                    <td><?= $i['kemasan'] ?></td>
                                    <td><?= $i['jumlah'] ?></td>
                                    <td><?= number_to_currency($i['harga'], 'IDR', 'id_ID', 2) ?></td>
                                    <td><?= number_to_currency($i['subtotal'], 'IDR', 'id_ID', 2) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Subtotal:</th>
                                <td><?= number_to_currency($penjualan['total'], 'IDR', 'id_ID') ?></td>
                            </tr>
                            <tr>
                                <th>Bayar:</th>
                                <td><?= number_to_currency($penjualan['bayar'], 'IDR', 'id_ID') ?></td>
                            </tr>
                            <tr>
                                <th>Kembalian:</th>
                                <td><?= number_to_currency($penjualan['kembalian'], 'IDR', 'id_ID') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
