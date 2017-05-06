<?php

/**
 * Class SiteController
 */
class SiteController
{
    /**
     * Главная страница
     * @return bool
     */
    public function actionIndex()
    {
        $topics = TopicList::getTopicsList();
        $lastQuestion = QuestionList::getLatestQuestions(10);

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    /**
     * Вопросы по выбраннй теме
     * @param $topicId
     * @return bool
     */
    public function actionTopic($topicId)
    {
        $topics = TopicList::getTopicsList();
        $question = QuestionList::getQuestionsListByTopic($topicId);
        // Подключаем вид
        require_once(ROOT . '/views/site/topic.php');
        return true;
    }

    /**
     * Страница 404
     * @return bool
     */
    public function action404()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/404.php');
        return true;
    }

}