

<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<h4><?= 'Тема №'.$topicId ?></h4>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
        <tr class="active">
            <th>ID вопроса</th>
            <th>Текст вопроса</th>
            <th>Дата создания</th>
            <th>Статус вопроса</th>
            <th>Подробности</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($question as $questionItem) : ?>
            <tr>
                <td><?= $questionItem['id']?></td>
                <td><?= $questionItem['description_question']?></td>
                <td><?= $questionItem['date_question']?></td>
                <?php if ($questionItem['status'] == 0) :?>
                    <td class="<?= 'danger' ?>">Ожидает ответа</td>
                <?php endif;?>

                <?php if ($questionItem['status'] == 2) :?>
                    <td class="<?= 'success' ?>">Опубликован</td>
                <?php endif;?>

                <?php if ($questionItem['status'] == 1) :?>
                <td class="<?= 'warning' ?>">Скрыт</td>
                <?php endif;?>
                <td><a href="question/<?= $questionItem['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                <td><a href="question/delete/<?= $questionItem['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
