<?php

namespace App;

class Db
{

  protected static $dbh;

  public function __construct()
  {

    $dsn = 'mysql:dbname=profit;host=localhost';
    $user = 'mysql';
    $password = 'mysql';

    self::$dbh = new \PDO ($dsn, $user, $password); // Новое подключение к mysql
    /**
     * Вывод ошибок везде делают через try catch.. при создании подключения?
     * https://habr.com/post/137664/
     */
  }

  /**
   * Выполняет SQL запроc к БД
   *
   * @param $sql - запрос
   * @param array $data - данные для подставновки
   * @param string $class - имя класса, где был вызов.
   * @return array|bool|string  -  возвращает объект, массив объектов или false, если неудача
   */
  public function query($sql, $data = [], $class = '')
  {
    self::$dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    $sth = self::$dbh->prepare($sql); // подготовка запроса

    // Проверка на корректность запроса
    if (false === $sth) {
      echo '<p class="warning"> Error occurred:' . implode(":", self::$dbh->errorInfo()) . '<p>';
      return false;
    }
    $sth->execute($data); // запуск подготовленного запроса
    $obj = $sth->fetchAll(\PDO::FETCH_CLASS, $class); // Возвращает все объекты
    //$obj = $sth->fetchObject( $class ); // возвращает 1 объект
    return $obj;
  }

  /**
   * Выполняет операции обновления/вставки/выборки
   *
   * @param $sql
   * @param array $data
   * @return bool - true в случае успеха
   */
  public function execute($sql, $data = [])
  {
    $sth = self::$dbh->prepare($sql);
    // var_dump($sth); exit();
    return $sth->execute($data); // запуск подготовленного запроса
  }


}