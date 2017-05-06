<?php

/**
 * Class AdminController
 */
class AdminController
{
    /**
     * Страница в панели администратора со списком администраторов
     * @return bool
     */
    public function actionIndex()
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        $admins = AdminList::getAdminsList();

        // Подключаем вид
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

    /**
     * Страница удаления администратора
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
            //Если форма отправлена
            //удаляем выбранного администратора;
            AdminAction::deleteAdminById($id);

            // Перенаправляем пользователя
            header("Location: /admin");
            die();

        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/delete.php');
        return true;
    }

    /**
     * Страница создания нового администратора
     * @return bool
     */
    public function actionCreate()
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        // Переменные для формы
        $login = false;
        $password = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            // Получаем данные из формы
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей

            if (!AdminCheck::checkLogin($login))
            {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!AdminCheck::checkLoginName($login))
            {
                $errors[] = 'Только латинские символы';
            }
            if (!AdminCheck::checkPassword($password))
            {
                $errors[] = 'Пароль не должен быть короче 8-ти символов';
            }
            if (AdminCheck::checkLoginExists($login))
            {
                $errors[] = 'Такое имя уже занято';
            }

            if ($errors == false)
            {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = AdminAction::createAdmin($login,$password);

                // Перенаправляем пользователя
                header("Location: /admin");
                die();
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/create.php');
        return true;
    }

    /**
     * Страница для изменения пароля
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        //Проверка авторизации;
        AdminCheck::checkLogged();

        //Получаем данные выбранного администратора
        $admin = AdminList::getAdminsListByID($id);

        if (isset($_POST['submit']))
        {
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей

            if (!AdminCheck::checkPassword($password))
            {
                $errors[] = 'Пароль не должен быть короче 8-ти символов';
            }

            if ($errors == false)
            {
                // Если ошибок нет
                //Изменяем пароль
                AdminAction::updatePasswordById($id, $password);

                // Перенаправляем пользователя
                header("Location: /admin");
                die();
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/update.php');
        return true;
    }

    /**
     * Страница авторизации
     * @return bool
     */
    public function actionAuth()
    {
        // Переменные для формы
        $login = false;
        $password = false;

        // Обработка формы
        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            // Получаем данные из формы
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!AdminCheck::checkLogin($login))
            {
                $errors[] = 'Неправильный логин';
            }
            if (!AdminCheck::checkPassword($password))
            {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $adminId = AdminCheck::checkAdminData($login, $password);

            if ($adminId == false)
            {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            }
            else
            {
                // Если данные правильные, запоминаем пользователя (сессия)
                AdminCheck::auth($adminId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /admin");
                die();
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/auth.php');
        return true;
    }

    /**
     * Страница подтверждения выхода
     * @return bool
     */
    public function actionLogout()
    {
        // Обработка формы
        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            // Стартуем сессию
        session_start();

        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["admin"]);

        // Перенаправляем пользователя на главную страницу
        header("Location: /");
        die();
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/exit.php');
        return true;
    }
}