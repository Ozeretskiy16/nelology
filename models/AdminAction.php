<?php

/**
 * Class AdminAction
 * Класс для выполнения действий над администраторами:
 * создание, удаление, изменение
 */
class AdminAction
{
    /**
     * Создание нового администратора
     * @param integer $login <p>Логин администратора</p>
     * @param integer $password <p>Пароль администратора</p>
     * @return bool <p>Результат добавления записи в таблицу</p>
     */
    public static function createAdmin($login, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO admins (login, password) '
            . 'VALUES (:login, :password)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Удаление выбранного администратора
     * @param integer $id <p>Идентификатор администратора</p>
     * @return bool <p>Результат удаления записи из таблицы</p>
     */
    public static function deleteAdminById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM admins WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Изменение пароля у выбранного администратора
     * @param integer $id <p>Идентификатор администратора</p>
     * @param integer $password <p>Пароль администратора</p>
     * @return bool <p>Результат изменения записи в таблице</p>
     */
    public static function updatePasswordById($id, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE admins SET password = :password WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();

    }

}