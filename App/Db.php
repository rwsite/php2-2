<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'profit';
        $user = 'mysql';
        $password = 'mysql';

        $this->dbh = new \PDO ('mysql:dbname=' . $dbname . ';host=' . $host, $user, $password); // Новое подключение к mysql
    }

    public function query($sql, $data = [], $class = '')
    {

        // про PDO http://phpfaq.ru/pdo
        $sth = $this->dbh->prepare($sql); // подготовка запроса
        $sth->execute($data); // запуск подготовленного запроса

        $data = $sth->fetchAll(\PDO::FETCH_ASSOC); // возвращает результат

        if (empty($class)) // имя класса пустое
            return $data;

        $ret = [];

        foreach ($data as $row) { // выводим по одной записи таблицы
            $obj = new $class; // новый объект класса, напрмиер Person
            foreach ($row as $col => $value) {
                $obj->$col = $value; // записываем свойство класса из бд
            }
            $ret[] = $obj;
        }
        return $ret;
    }

}


//var_dump($db->query('SELECT * FROM persons WHERE id=:id', [':id' => 1]));