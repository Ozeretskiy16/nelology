<?php

/**
 * Class QuestionCheck
 * Проверка валидности данных по вопросам
 */
class QuestionCheck
{
    /**
     * Проверка валидности имени автора
     * -только кирилица и латиница
     * @param string $author <p>Имя автора вопроса</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkAuthorName($author)
    {
        if (preg_match('/[а-яА-ЯёЁa-zA-Z][а-яА-ЯёЁa-zA-Z]+$/u', $author) == true)
        {
            return true;
        }
        return false;
    }

    /**
     * Проверка валидности длинны имени автора:
     * -не короче двух символов;
     * @param string $author <p>Имя автора вопроса</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkAuthorLength($author)
    {
        if (strlen($author) >= 2)
        {
            return true;
        }
        return false;
    }

    /**
     *Проверка валидности длинны минимальной вопроса:
     * -не короче 10 символов
     * @param $question <p>Текст вопроса</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkQuestionMinLength($question)
    {
        if (mb_strlen($question) >= 10)
        {
            return true;
        }
        return false;
    }

    /**
     *Проверка валидности длинны максимальной вопроса:
     * -не длиннее 250 символов
     * @param $question <p>Текст вопроса</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkQuestionMaxLength($question)
    {
        if (mb_strlen($question) <= 250)
        {
            return true;
        }
        return false;
    }

    /**
     *Проверка валидности минимальной длинны ответа:
     * -не короче 10 символов
     * @param $answer <p>Текст ответа</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkAnswerMinLength($answer)
    {
        if (mb_strlen($answer) >= 5)
        {
            return true;
        }
        return false;
    }

    /**
     *Проверка валидности максимальной длинны ответа:
     * -не  длиннее 250 символов
     * @param $answer <p>Текст ответа</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkAnswerMaxLength($answer)
    {
        if (mb_strlen($answer) <= 250)
        {
            return true;
        }
        return false;
    }


    /**
     * Проверка валидности email
     * @param string $email <p>E-mail</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (preg_match('~^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$~',$email) == true)
        {
            return true;
        }
        return false;
    }
}