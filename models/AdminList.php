<?php

/**
 * Class AdminList
 * Класс для работы со списками администраторов
 */
class AdminList
{
    /**
     * Возваращает массив администраторов
     * @return array <p>Массив с администраторами</p>
     */
    public static function getAdminsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, login FROM admins ORDER BY id ASC');

        // Получение и возврат результатов
        $i = 0;
        $adminList = array();
        while ($row = $result->fetch())
        {
            $adminList[$i]['id'] = $row['id'];
            $adminList[$i]['login'] = $row['login'];
            $i++;
        }
        return $adminList;
    }

    /**
     * Возвращает массив с данными выбранного администраторов
     * @param integer $id <p>Идентификатор администратора</p>
     * @return array <p>Массив с данными выбранного администратора</p>
     */
    public static function getAdminsListByID($id)
    {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, login, password FROM admins WHERE id = :id ';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $admin = array();
        while ($row = $result->fetch())
        {
            $admin[$i]['id'] = $row['id'];
            $admin[$i]['login'] = $row['login'];
            $admin[$i]['password'] = $row['password'];

            $i++;
        }
        return $admin;
    }

}