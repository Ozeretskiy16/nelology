
<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
        <tr class="active">
            <th>ID администратора</th>
            <th>Имя администратора</th>
            <th>Изменить пароль</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($admins as $adminItem) : ?>
            <tr>
                <td><?= $adminItem['id'];?></td>
                <td><?= $adminItem['login'];?></td>
                <td><a href="/admin/update/<?= $adminItem['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                <td><a href="/admin/delete/<?= $adminItem['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td>
                    <a href="admin/create" class="btn bnt-info" role="button">
                        <i class="fa fa-user-plus" aria-hidden="true">Создать</i>
                    </a>
                </td>
            </tr>
            </tbody>
    </table>
</div>


<?php include ROOT . '/views/layouts/footer_admin.php'; ?>