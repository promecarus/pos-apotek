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
                        <div class="col">
                            <button class="btn btn-warning btn-block" onclick="updateData()">Update</button>
                        </div>
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
<?= $this->include("component/formTableGenerator") ?>
<?= $this->endSection() ?>
