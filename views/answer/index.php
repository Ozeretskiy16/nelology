

<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
        <tr class="active">
            <th>ID вопроса</th>
            <th>Автор</th>
            <th>E-mail</th>
            <th>Дата создания</th>
            <th>Текст вопроса</th>
            <th>Ответить</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($question as $questionItem) : ?>
            <tr>
                <td><?= $questionItem['id']?></td>
                <td><?= $questionItem['author']?></td>
                <td><?= $questionItem['e_mail']?></td>
                <td><?= $questionItem['date_question']?></td>
                <td><?= $questionItem['description_question']?></td>
                <td><a href="answer/<?= $questionItem['id'];?>"><i class="fa fa-check-square" aria-hidden="true"></i></a></td>
                <td><a href="admin/topic/question/update/<?= $questionItem['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                <td><a href="admin/topic/question/delete/<?= $questionItem['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
