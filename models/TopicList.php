<?php

/**
 * Class TopicList
 * Класс для работы со списками тем
 */
class TopicList
{
    /**
     * Возваращает массив с темами
     * @return array <p>Массив с темами</p>
     */
    public static function getTopicsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name FROM topics ORDER BY id ASC');

        // Получение и возврат результатов
        $i = 0;
        $topicList = array();
        while ($row = $result->fetch())
        {
            $topicList[$i]['id'] = $row['id'];
            $topicList[$i]['name'] = $row['name'];
            $i++;
        }
        return $topicList;

    }

}