<?php

/**
 * Class QuestionList
 * Класс для работы со списками вопросов
 */
class QuestionList
{
    /**
     * Количество отображаемых вопросов на главной странице по умолчанию
     */
    const SHOW_BY_DEFAULT = 10;

    /**
     * Возваращает массив последних вопросов
     * @param int $count <p>Колличество отображаемых вопросов</p>
     * @return array <p>Массив с вопросами</p>
     */
    public static function getLatestQuestions($count = self::SHOW_BY_DEFAULT)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, description_question, description_answer FROM questions '
            . 'WHERE status = "2" ORDER BY date_question DESC '
            . 'LIMIT :count';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $questionList = array();
        while ($row = $result->fetch())
        {
            $questionList[$i]['id'] = $row['id'];
            $questionList[$i]['description_question'] = $row['description_question'];
            $questionList[$i]['description_answer'] = $row['description_answer'];
            $i++;
        }
        return $questionList;

    }

    /**
     * Возваращает массив опубликованных вопросов из выбранной темы
     * @param integer $topicId <p>Идентификатор темы</p>
     * @return array <p>Массив с вопросами</p>
     */
    public static function getQuestionsListByTopic($topicId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, description_question, description_answer, status FROM questions '
            . 'WHERE status = 2 AND topic_id = :topic_id '
            . 'ORDER BY id ASC';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':topic_id', $topicId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $question = array();
        while ($row = $result->fetch())
        {
            $question[$i]['id'] = $row['id'];
            $question[$i]['description_question'] = $row['description_question'];
            $question[$i]['description_answer'] = $row['description_answer'];
            $question[$i]['status'] = $row['status'];
            $i++;
        }
        return $question;
    }

    /**
     * Возваращает массив всех вопросов из выбранной темы
     * @param integer $topicId <p>Идентификатор темы</p>
     * @return array <p>Массив с вопросами</p>
     */
    public static function getQuestionsListByTopicAll($topicId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, description_question, description_answer, status, date_question FROM questions '
            . 'WHERE topic_id = :topic_id '
            . 'ORDER BY id ASC';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':topic_id', $topicId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $question = array();
        while ($row = $result->fetch())
        {
            $question[$i]['id'] = $row['id'];
            $question[$i]['description_question'] = $row['description_question'];
            $question[$i]['description_answer'] = $row['description_answer'];
            $question[$i]['status'] = $row['status'];
            $question[$i]['date_question'] = $row['date_question'];
            $i++;
        }
        return $question;
    }


    /**
     * Возвращает массив вопросов без ответа
     * @return array <p>Массив с вопросами</p>
     */
    public static function getTotalQuestionsUnanswered()
    {
        //echo 'Возвращает колличество вопросов по теме без ответа';
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT id, description_question, author, e_mail, date_question FROM questions '
            . 'WHERE status = 0 '
            . 'ORDER BY date_question ASC';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $question = array();
        while ($row = $result->fetch())
        {
            $question[$i]['id'] = $row['id'];
            $question[$i]['description_question'] = $row['description_question'];
            $question[$i]['author'] = $row['author'];
            $question[$i]['e_mail'] = $row['e_mail'];
            $question[$i]['date_question'] = $row['date_question'];
            $i++;
        }
        return $question;
    }

    /**
     * Возвращает массив содержащий данные по выбранному вопросу
     * @param integer $id <p>Идентификатор выбранного вопроса</p>
     * @return array <p>Массив с вопросами</p>
     */
    public static function getQuestionUnansweredByID($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT description_question, author, e_mail, date_question FROM questions '
            . 'WHERE status = 0 and id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $question = array();
        while ($row = $result->fetch())
        {
            $question[$i]['description_question'] = $row['description_question'];
            $question[$i]['author'] = $row['author'];
            $question[$i]['e_mail'] = $row['e_mail'];
            $question[$i]['date_question'] = $row['date_question'];
            $i++;
        }
        return $question;
    }

    /**
     * Возвращает массив, содержащий данные выбранного вопроса
     * @param integer $id <p>Идентификатор выбранного вопроса</p>
     * @return array <p>Массив с вопросами</p>
     */
    public static function getQuestionsByID($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, topic_id, author, description_question, description_answer, status FROM questions '
            . 'WHERE id = :id ';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $question = array();
        while ($row = $result->fetch())
        {
            $question[$i]['id'] = $row['id'];
            $question[$i]['topic_id'] = $row['topic_id'];
            $question[$i]['author'] = $row['author'];
            $question[$i]['description_question'] = $row['description_question'];
            $question[$i]['description_answer'] = $row['description_answer'];
            $question[$i]['status'] = $row['status'];
            $i++;
        }
        return $question;
    }
}