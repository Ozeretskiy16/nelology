<?php

/**
 * Class AdminCheck
 * Авторизация, проверка валидности, при работе с администраторами
 */
class AdminCheck
{
    /**
     * Проверка на существование логина
     * @param integer $login <p>Логин администратора</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkLoginExists($login)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM admins WHERE login = :login';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Проверка валидности логина:
     * -не короче двух символов
     * @param integer $login <p>Логин администратора</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkLogin($login)
    {
        if (strlen($login) >= 2)
        {
            return true;
        }
        return false;
    }

    /**
     * Проверка валидности логина:
     * -только латинские символы
     * @param integer $login <p>Логин администратора</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkLoginName($login)
    {
        if (preg_match('~^[a-zA-Z]+$~',$login) == true)
        {
            return true;
        }
        return false;
    }

    /**
     * Проверка валидности пароля:
     * -не короче шести символов;
     * @param integer $password <p>Пароль администратора</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 8)
        {
            return true;
        }
        return false;
    }

    /**
     *Проверка существования администратора:
     * @param integer $login <p>Логин администратора</p>
     * @param integer $password <p>Пароль администратора</p>
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkAdminData($login, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM admins WHERE login = :login AND password = :password';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $admin = $result->fetch();

        if ($admin)
        {
            // Если запись существует, возвращаем id пользователя
            return $admin['id'];
        }
        return false;
    }

    /**
     * Запоминаем администратора
     * @param integer $adminId <p>Идентификатор администратора</p>
     */
    public static function auth($adminId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['admin'] = $adminId;
    }

    /**
     * Если администратор авторизован, возвращает его идентификатор
     * @return mixed
     */
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['admin']))
        {
            return $_SESSION['admin'];
        }

        header("Location: /auth");
        die();
    }

}