<?php

/**
 * Class QuestionAction
 * Класс для выполнения действий над вопросами:
 * создание, удаление, изменение
 */
class QuestionAction
{
    /**
     * Создание нового вопроса
     * @param array $options <p>Массив с данным по вопросу</p>
     * @return bool <p>Результат добавления записи в таблицу</p>
     */
    public static function createQuestion($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO questions (author, e_mail, description_question, topic_id, status, date_question)'
            . 'VALUES (:author, :e_mail, :description_question, :topic_id, :status, :date_question)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':e_mail', $options['e_mail'], PDO::PARAM_STR);
        $result->bindParam(':description_question', $options['description_question'], PDO::PARAM_STR);
        $result->bindParam(':topic_id', $options['topic_id'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':date_question', $options['date_question'], PDO::PARAM_STR);


        return $result->execute();
    }

    /**
     * Создание ответа на выбранный вопрос
     * @param integer $id <p>Идентификатор выбранного вопроса</p>
     * @param string $answer <p>Текст ответа</p>
     * @param $status <p>Статус <i>(скрыт "1", опубликован "2")</i></p>
     * @return bool <p>Результат добавления записи в таблицу</p>
     */
    public static function createAnswer($id, $answer, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'UPDATE questions SET description_answer = :description_answer, status = :status WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':description_answer', $answer, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();

    }

    /**
     * Удаление выбранного вопроса
     * @param $id <p>Идентификатор выбранного вопроса</p>
     * @return bool <p>Результат удаления записи из таблицы</p>
     */
    public static function deleteQuestionById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM questions WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();

    }

    /**
     * Удаление всех вопросов выбранной темы
     * @param $id <p>Идентификатор выбранного вопроса</p>
     * @return bool <p>Результат удаления записи из таблицы</p>
     */
    public static function deleteAllQuestionInTopicById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM questions WHERE topic_id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Изменение выбранного вопроса
     * @param $id <p>Идентификатор выбранного вопроса</p>
     * @param array $options <p>Массив с данным по вопросу</p>
     * @return bool <p>Результат изменения записи в таблице</p>
     */
    public static function updateQuestionById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE questions SET author = :author, description_question = :description_question, description_answer = :description_answer, status = :status, topic_id = :topic_id WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':description_question', $options['description_question'], PDO::PARAM_STR);
        $result->bindParam(':description_answer', $options['description_answer'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':topic_id', $options['topic_id'], PDO::PARAM_INT);
        return $result->execute();

    }
}