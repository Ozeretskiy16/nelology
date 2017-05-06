
<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="container" style="width: 30%">
    <h4>Администратор #<?= $id ?></h4>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="#" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group has-error">

            <label for="password">Установите пароль</label>
            <input id="password" class="form-control" type="text" name="password" value="<?= $admin[0]['password']?>">

        </div>
        <input type="submit" name="submit" class="btn btn-info" value="Сохранить">
    </form>
</div>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

