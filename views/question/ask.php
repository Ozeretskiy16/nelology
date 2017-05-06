
<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container" style="width: 30%">
    <h4>Задать вопрос</h4>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="#" method="post" role="form">
        <div class="form-group has-error">
            <input class="form-control" type="text" name="author" placeholder="Введите имя">
            <br/>
            <input class="form-control" type="text" name="e_mail" placeholder="Введите e-mail">
            <br/>
            <textarea placeholder="Текст вопроса" class="form-control" name="description_question"></textarea>
            <br/>
            <label for="topic">Выберите тему:</label>
            <select id="topic" name="topic_id">
                <?php foreach ($topic as $topicItem) :?>
                    <option value="<?= $topicItem['id']?>"><?= $topicItem['name']?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" value="<?= date("Y-m-d H:i:s");?>" name="date_question">

        </div>
        <input type="submit" name="submit" class="btn btn-info" value="Создать">
    </form>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>