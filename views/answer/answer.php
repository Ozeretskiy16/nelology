
<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="container" style="width: 30%">
    <h4>Ответ на вопрос #<?= $id ?></h4>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="#" method="post" role="form">
        <div class="form-group has-error">
            <label for="question"><?= $question[0]['description_question']?></label>
            <input id="question" class="form-control" type="text" name="answer" placeholder="Текст ответа">
            <label for="status">Статус:</label>
            <select id="status" name="status" style="margin-top: 20px">
                <option value="2">Отображается</option>
                <option value="1">Скрыт</option>
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-success" value="Ответить">
    </form>
</div>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>