
<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="container" style="width: 30%">
    <h4>Создание нового администратора</h4>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="#" method="post" role="form">
        <div class="form-group has-error">
            <input class="form-control" type="text" name="login" placeholder="Введите имя">
            <br/>
            <input class="form-control" type="password" name="password" placeholder="Введите пароль">
        </div>
        <input type="submit" name="submit" class="btn btn-info" value="Создать">
    </form>
</div>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>