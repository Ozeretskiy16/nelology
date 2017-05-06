

<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<p><?= 'Вопрос №'.$id ?></p>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
        <tr class="active">
            <th>ID вопроса</th>
            <th>Автор</th>
            <th>Текст вопроса</th>
            <th>Текст ответа</th>
            <th>Статус вопроса</th>
            <th>Редактировать</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($question as $questionItem) : ?>
            <tr>
                <td><?= $questionItem['id']?></td>
                <td><?= $questionItem['author']?></td>
                <td><?= $questionItem['description_question']?></td>
                <td><?= $questionItem['description_answer']?></td>

                <?php if ($questionItem['status'] == 0) :?>
                    <td class="<?= 'danger' ?>">Ожидает ответа</td>
                <?php endif;?>

                <?php if ($questionItem['status'] == 2) :?>
                    <td class="<?= 'success' ?>">Опубликован</td>
                <?php endif;?>

                <?php if ($questionItem['status'] == 1) :?>
                    <td class="<?= 'warning' ?>">Скрыт</td>
                <?php endif;?>

                <td><a href="update/<?= $questionItem['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
