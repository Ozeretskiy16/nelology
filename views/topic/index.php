
<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
        <tr class="active">
            <th>ID темы</th>
            <th>Название темы</th>
            <th>Подробности</th>
            <th>Удалить</th>
            <th>Всего вопросов</th>
            <th>Без ответа</th>
            <th>Опубликовано</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($topics as $topicItem) : ?>
            <tr>
                <td> <?= $topicItem['id'];?></td>
                <td><?= $topicItem['name'];?></td>
                <td><a href="topic/<?= $topicItem['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                <td><a href="topic/delete/<?= $topicItem['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                <td><?= QuestionCount::getTotalQuestionsInTopic($topicItem['id'])?></td>
                <td><?= QuestionCount::getTotalQuestionsInTopicUnanswered($topicItem['id'])?></td>
                <td><?= QuestionCount::getTotalQuestionsInTopicPublished($topicItem['id'])?></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td>
                    <a href="topic/create" class="btn bnt-info" role="button">
                        <i class="fa fa-plus" aria-hidden="true"></i>Создать
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>