<?php

/**
 * Class TopicController
 */
class TopicController
{
    /**
     * Страница в панели администратора со списком тем
     * @return bool
     */
    public function actionIndex()
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        $topics = TopicList::getTopicsList();

        // Подключаем вид
        require_once(ROOT . '/views/topic/index.php');
        return true;
    }

    /**
     * Страница в панели администратора со списком вопросов в выбранной теме
     * @param $topicId
     * @return bool
     */
    public function actionView($topicId)
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        $question = QuestionList::getQuestionsListByTopicAll($topicId);

        // Подключаем вид
        require_once(ROOT . '/views/topic/view.php');
        return true;
    }

    /**
     * Страница удаления темы
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
            TopicAction::deleteTopicById($id);
            QuestionAction::deleteAllQuestionInTopicById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/topic");
            die();
        }
        // Подключаем вид
        require_once(ROOT . '/views/topic/delete.php');
        return true;
    }

    /**
     * Страница в создания темы
     * @return bool
     */
    public function actionCreate()
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        // Обработка формы
        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];

            // Флаг ошибок в форме
            $errors = false;

            // Валидация полей

            if (!TopicCheck::checkTopicName($name))
            {
                $errors[] = 'Название темы не должно содержать специальные символы и начинаться с цифры';
            }

            if ($errors == false)
            {
                // Если ошибок нет
                // Добавляем новую категорию
                TopicAction::createTopic($name);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/topic");
                die();
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/topic/create.php');
        return true;
    }
}