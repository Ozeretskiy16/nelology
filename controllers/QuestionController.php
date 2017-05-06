<?php

/**
 * Class QuestionController
 */
class QuestionController
{
    /**
     * Страница с вопросами по выбранной теме
     * @param $id
     * @return bool
     */
    public function actionIndex($id)
    {
        $question = QuestionList::getQuestionsByID($id);

        // Подключаем вид
        require_once(ROOT . '/views/question/index.php');
        return true;
    }

    /**
     * Страница удаления вопроса
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        // Обработка формы
        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            QuestionAction::deleteQuestionById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/topic");
            die();
        }

        // Подключаем вид
        require_once(ROOT . '/views/question/delete.php');
        return true;
    }


    /**
     * Страница изменения вопроса
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        $question = QuestionList::getQuestionsByID($id);
        $topic = TopicList::getTopicsList();


        // Обработка формы
        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            // Получаем данные из формы редактирования.
            $options['author'] = $_POST['author'];
            $options['description_question'] = $_POST['description_question'];
            $options['topic_id'] = $_POST['topic_id'];

            if (isset($_POST['status']))
            {
                $options['status'] = $_POST['status'];
            }
            if (isset($_POST['description_answer']))
            {
                $options['description_answer'] = $_POST['description_answer'];
            }

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!QuestionCheck::checkAuthorLength($options['author']))
            {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!QuestionCheck::checkAuthorName($options['author']))
            {
                $errors[] = 'Имя не должно содержать цифры и специальные символы';
            }
            if (!QuestionCheck::checkQuestionMinLength($options['description_question']))
            {
                $errors[] = 'Вопрос не должен быть короче 10-и символов';
            }
            if (!QuestionCheck::checkQuestionMaxLength($options['description_question']))
            {
                $errors[] = 'Вопрос не должен быть длиннее 250-и символов';
            }
            if (isset($_POST['description_answer']))
            {
                if (!QuestionCheck::checkAnswerMinLength($options['description_answer']))
                {
                    $errors[] = 'Ответ не должен быть короче 5-и символов';
                }
                if (!QuestionCheck::checkAnswerMaxLength($options['description_answer']))
                {
                    $errors[] = 'Ответ не должен быть длиннее 250-и символов';
                }
            }

            if ($errors == false)
            {
                //Если ошибок нет
                //Сохраняем изменения
            QuestionAction::updateQuestionById($id, $options);

            // Перенаправляем пользователя
            header("Location: /admin/topic");
            die();
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/question/update.php');
        return true;
    }

    /**
     * Страница создания вопроса
     * @return bool
     */
    public function actionCreate()
    {

        $topic = TopicList::getTopicsList();

        // Обработка формы
        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            // Получаем данные из формы
            $options['author'] = $_POST['author'];
            $options['e_mail'] = $_POST['e_mail'];
            $options['description_question'] = $_POST['description_question'];
            $options['topic_id'] = $_POST['topic_id'];
            $options['status'] = 0;
            $options['date_question'] = $_POST['date_question'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!QuestionCheck::checkAuthorLength($options['author']))
            {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!QuestionCheck::checkAuthorName($options['author']))
            {
                $errors[] = 'Имя не должно содержать цифры и специальные символы';
            }
            if (!QuestionCheck::checkQuestionMinLength($options['description_question']))
            {
                $errors[] = 'Вопрос не должен быть короче 10-и символов';
            }
            if (!QuestionCheck::checkQuestionMaxLength($options['description_question']))
            {
                $errors[] = 'Вопрос не должен быть длиннее 250-и символов';
            }
            if (!QuestionCheck::checkEmail($options['e_mail']))
            {
                $errors[] = 'Указан неверный e-mail';
            }

            if ($errors == false)
            {
                QuestionAction::createQuestion($options);

                // Перенаправляем пользователя
                header("Location: /");
                die();
            }
        }

            // Подключаем вид
            require_once(ROOT . '/views/question/ask.php');
            return true;

    }

    /**
     * Страница со списком неотвеченных вопросов
     * @return bool
     */
    public function actionUnanswered()
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        $question = QuestionList::getTotalQuestionsUnanswered();

        // Подключаем вид
        require_once(ROOT . '/views/answer/index.php');
        return true;

    }

    /**
     * Страница ответа на вопросы
     * @param $id
     * @return bool
     */
    public function actionAnswer($id)
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        $question = QuestionList::getQuestionUnansweredByID($id);

        // Обработка формы
        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            // Получаем данные из формы
            $answer = $_POST['answer'];
            $status = $_POST['status'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей

            if (!QuestionCheck::checkAnswerMinLength($answer))
            {
                $errors[] = 'Ответ не должен быть короче 5-и символов';
            }
            if (!QuestionCheck::checkAnswerMaxLength($answer))
            {
                $errors[] = 'Ответ не должен быть длиннее 250-и символов';
            }

            if ($errors == false)
            {
                //Если ошибок нет
                //Сохраняем ответ на вопрос
                QuestionAction::createAnswer($id, $answer, $status);

            // Перенаправляем пользователя
            header("Location: /admin");
            die();
            }

        }

        // Подключаем вид
        require_once(ROOT . "/views/answer/answer.php");
        return true;
    }
}