<?php

/**
 * Class QuestionCount
 * Класс для работы с подсчетом колличества вопросов
 */
class QuestionCount
{
    /**
     * Возвращает общее колличество вопросов в теме
     * @param integer $topicId <p>Идентификатор темы</p>
     * @return mixed
     */
    public static function getTotalQuestionsInTopic($topicId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM questions WHERE topic_id = :topic_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':topic_id', $topicId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращает колличество вопросов без ответа в теме
     * @param integer $topicId <p>Идентификатор темы</p>
     * @return mixed
     */
    public static function getTotalQuestionsInTopicUnanswered($topicId)
    {
        //echo 'Возвращает колличество вопросов по теме без ответа';
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM questions WHERE status="0" AND topic_id = :topic_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':topic_id', $topicId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращает колличество опубликованных вопросов в теме
     * @param integer $topicId <p>Идентификатор темы</p>
     * @return mixed
     */
    public static function getTotalQuestionsInTopicPublished($topicId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM questions WHERE status="2" AND topic_id = :topic_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':topic_id', $topicId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];

    }
}