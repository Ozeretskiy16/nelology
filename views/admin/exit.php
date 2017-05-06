<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <div class="container" style="width: 30%">
        <form method="post" role="form">
            <div class="form-group has-error">
                <h3>Вы действительно хотите выйти?</h3>
                <input type="submit" name="submit" class="btn btn-danger" style="width: 100px" value="Да">
            </div>
        </form>
    </div>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>