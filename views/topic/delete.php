
<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <div class="container" style="width: 30%">

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form method="post" role="form">
            <div class="form-group has-error">
                <h3>Вы действительно хотите удалить тему №<?= $id ?> и все вопросы в ней?</h3>
                <input type="submit" name="submit" class="btn btn-danger" value="Удалить">
            </div>


        </form>
    </div>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>