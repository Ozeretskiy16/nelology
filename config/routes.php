<?php

//массив с маршрутами;

return array(

    //Удаление конкретного вопроса;
    'admin/topic/question/delete/([0-9]+)' => 'question/delete/$1',
    //Конкретный вопрос;
    'admin/topic/question/([0-9]+)' => 'question/index/$1',
    //Редактирование конкретного вопроса;
    'admin/topic/question/update/([0-9]+)' => 'question/update/$1',


    //Создание темы;
    'admin/topic/create' => 'topic/create',
    //Удаление темы;
    'admin/topic/delete' => 'topic/delete',
    //Конкретная тема;
    'admin/topic/([0-9]+)' => 'topic/view/$1',
    //Список тем;
    'admin/topic' => 'topic/index',


    //Удаление администратора;
    'admin/delete/([0-9]+)' => 'admin/delete/$1',
    //Изменение пароля;
    'admin/update/([0-9]+)' => 'admin/update/$1',
    //Создание администратора;
    'admin/create' => 'admin/create',
    //Администраторы;
    'admin' => 'admin/index',

    //Авторихация;
    'auth' => 'admin/auth',

    //Выход;
    'exit' => 'admin/logout',

    //Задать вопрос;
    'ask' => 'question/create',

    //Ответ на конкретный вопрос;
    'answer/([0-9]+)' => 'question/answer/$1',
    //Список с неотвечеными вопросами;
    'answer' => 'question/unanswered',

    //Вопросами по выбранной теме;
    'topic/([0-9]+)' => 'site/topic/$1',

    //Страница 404
    '404' => 'site/404',

    //Главная страница сайта;
    'index.php' => 'site/index',
    '' => 'site/index',

);