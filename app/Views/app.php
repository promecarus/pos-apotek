<!DOCTYPE html>
<!-- <html data-theme="light" lang="en"> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($title) ? $title . " | " : "") . ($_ENV['app.concept'] . ' ' . $_ENV['app.theme']) ?></title>
    <link rel="stylesheet" href="/css/app.min.css">
</head>

<body>
    <?= $this->include('component/toast') ?>
    <?= $this->renderSection('content') ?>
    <script src="/js/app.min.js"></script>
    <script src="/js/all.min.js"></script>
</body>

</html>
