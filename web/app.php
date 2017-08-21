<?php
if (file_exists(__DIR__ . '/index_' . $_GET['fr'] . '.php')) {
    include __DIR__ . '/index_zend.php';
} else {
    ?>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <div class="container">
        <dl>
            <dt>ZF Application</dt>
            <dd>
                Open zend-based <a href ="/?fr=zend">application</a>
            </dd>
            <dt>Symfony Application</dt>
            <dd>
                Open symfony-based <a href ="/?fr=symfony">application</a>
            </dd>
        </dl>
        <hr>
        <footer>
            &copy; 2017 - <?= date('Y') ?>
        </footer>
    </div>
    </html>
    <?
}
