<?php

/**
 * Class TopicAction
 * Класс для выполнения действий над списками:
 * создание, удаление, изменение
 */
class TopicAction
{
    /**
     * Создание новой темы
     * @param string $name <p>Название темы</p>
     * @return bool <p>Результат добавления записи в таблицу</p>
     */
    public static function createTopic($name)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO topics (name) VALUES (:name)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Удаление выбранной темы
     * @param integer $id <p>Идентификатор темы</p>
     * @return bool <p>Результат удаления записи из таблицы</p>
     */
    public static function deleteTopicById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM topics WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}