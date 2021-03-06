<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/3686b85462.js"></script>

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header col-md-1">
            <a href="/" class="navbar-brand">FAQ</a>
        </div>

        <div class="col-md-8">
            <ul class="nav navbar-nav">
                <li><a href="/">Главная</a></li>
                <li><a href="/ask">Задать вопрос</a></li>
            </ul>
        </div>

        <div class="col-md-2">
            <ul class="nav navbar-nav">
                <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="/admin"><i class="fa fa-user-circle-o" aria-hidden="true">Панель управления</i></a></li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="col-md-1">
            <ul class="nav navbar-nav">
                <?php if (!isset($_SESSION['admin'])) : ?>
                <li><a href="/auth"><i class="fa fa-sign-in" aria-hidden="true">Войти</i></a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li><a href="/exit"><i class="fa fa-sign-out" aria-hidden="true">Выйти</i></a></li>
                <?php endif; ?>
            </ul>
        </div>

    </div>
</nav>