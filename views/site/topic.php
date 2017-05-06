
<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="row">
    <div class="col-md-2">
        <ul class="nav navbar-tabs">
            <?php foreach ($topics as $topicItem) : ?>
                <li class="active">
                    <a style="<?php if ($topicId == $topicItem['id']) echo "color: #111111"?>" href="/topic/<?= $topicItem['id'];?>">
                        <?= $topicItem['name'];?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="col-md-8" style="margin: 5px">

        <h5>Вопросы по теме #<?= $topicId ?></h5>

        <div class="panel-group" id="collapse-group">
            <?php foreach ($question as $questionItem) : ?>
                <div class="panel">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#collapse-group" href="#<?= $questionItem['id'] ?>">
                            <?= $questionItem['description_question'] ?>
                        </a>
                    </div>
                    <div id="<?= $questionItem['id'] ?>" class="collapse">
                        <div class="panel-body">
                            <?= $questionItem['description_answer'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>
