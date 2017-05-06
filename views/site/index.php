
<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="row">
    <div class="col-md-2">
        <ul class="nav navbar-tabs">
            <?php foreach ($topics as $topicItem) : ?>
            <li class="active"><a href="/topic/<?= $topicItem['id'];?>"><?= $topicItem['name'];?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="col-md-8" style="margin: 5px">

        <h4>Десять последних вопросов:</h4>

        <div class="panel-group" id="collapse-group">
            <?php foreach ($lastQuestion as $lastQuestionItem) : ?>
            <div class="panel">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#collapse-group" href="#<?= $lastQuestionItem['id'] ?>">
                        <?= $lastQuestionItem['description_question'] ?>
                    </a>
                </div>
                <div id="<?= $lastQuestionItem['id'] ?>" class="collapse">
                    <div class="panel-body">
                        <?= $lastQuestionItem['description_answer'] ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>