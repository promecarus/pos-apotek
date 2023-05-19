<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($_ENV["app.concept"] . " " . $_ENV["app.theme"]) . (isset($title) ? " | " . $title  : "") ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <?= $this->renderSection("link") ?>
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body class="<?= $bodyClass . (session()->get('theme') ? " dark-mode" : "") ?>" ?>
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dist/js/adminlte.min.js"></script>
    <?= $this->include("component/toast") ?>
    <?= $this->renderSection("content") ?>
</body>

</html>
