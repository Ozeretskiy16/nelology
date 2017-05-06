<?php

/**
 * Class TopicCheck
 */
class TopicCheck
{
    /**
     * Проверка валидности названия темы:
     * -только кирилица, латиница и пробелы
     * @param string $topic <p>Название темы</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkTopicName($topic)
    {
        if (preg_match('/[а-яА-ЯёЁa-zA-Z][а-яА-ЯёЁa-zA-Z0-9]+$/u', $topic) == true)
        {
            return true;
        }
        return false;
    }

}