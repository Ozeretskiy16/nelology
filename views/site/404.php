<?php header('HTTP/1.1 404 Not Found');?>

<?php include ROOT . '/views/layouts/header.php'; ?>
    <div style="padding: 50px 0 0 250px">
        <h2>404</h2>
        <h3>К сожалению, запрашиваемая страница не найдена...</h3>
        <a href="/ask" class="btn btn-success">Спросите нас почему</a>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>