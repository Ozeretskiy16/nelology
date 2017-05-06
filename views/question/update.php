
<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="container" style="width: 30%">
    <h4>Редактирование вопроса #<?= $id ?></h4>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="#" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group has-error">

            <label for="author">Автор вопроса</label>
            <input id="author" class="form-control" type="text" name="author" value="<?= $question[0]['author']?>">

            <label for="question">Текст вопроса</label>
            <textarea id="question" class="form-control" name="description_question"><?= $question[0]['description_question']?></textarea>

            <?php if ($question[0]['status'] != 0) : ?>

            <label for="answer">Текст ответа</label>
            <textarea id="question" class="form-control" name="description_answer"><?= $question[0]['description_answer']?></textarea>

            <label for="status">Статус:</label>
            <select id="status" name="status" style="margin-top: 20px">
                <option value="2" <?php if ($question[0]['status'] == 2) echo ' selected="selected"'; ?>>Отображается</option>
                <option value="1" <?php if ($question[0]['status'] == 1) echo ' selected="selected"'; ?>>Скрыт</option>
            </select>
            <?php endif; ?>
            <br/>
            <label for="topic">Тема:</label>
            <select id="topic" name="topic_id">
                <?php foreach ($topic as $topicItem) :?>
                <option value="<?= $topicItem['id']?>" <?php if ($question[0]['topic_id'] == $topicItem['id'] ) echo ' selected="selected"'; ?>><?= $topicItem['name']?></option>
                <?php endforeach; ?>
            </select>
            <br/>
            <?php if ($question[0]['status'] == 0) : ?>
            <br/>
            <h4 style="color: #dd4444">Вопрос без ответа!</h4>
            <?php endif; ?>

        </div>
        <a href="/answer/<?= $id; ?>" class="btn btn-success">Ответить</a>
        <input type="submit" name="submit" class="btn btn-info" value="Сохранить">
    </form>
</div>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

