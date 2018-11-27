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


  public function query($sql, $data = [], $class = '')
  {

    self::$dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    $sth = self::$dbh->prepare($sql); // подготовка запроса

    // Проверка на корректность запроса
    if (false === $sth) {
      echo 'Error occurred:' . implode(":", self::$dbh->errorInfo());
      return $sth;
    }

    $sth->execute($data); // запуск подготовленного запроса
    $class = $sth->fetchAll(\PDO::FETCH_CLASS); // возвращает результат
    // Если нет результата
    if(empty($class))
      return false;

    return $class;
  }

  /**
   * @param $sql - подготовленный запрос mysql
   * @param array $data - массив подстановок
   * @param string $class - имя класса, в котором вызывается
   * @return bool - в случасае успеха true
   */
  public function query_add($sql, $data = [], $class = '')
  {

    self::$dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    $sth = self::$dbh->prepare($sql); // подготовка запроса
    // Проверка на корректность запроса
    if (false === $sth) {
      echo 'Error occurred:' . implode(":", self::$dbh->errorInfo());
      return false;
    }

    $sth->execute($data); // запуск подготовленного запроса
    if (assert(self::$dbh->errorCode() === '00000')) {
      return true; // Завершилось без ошибок, классу пустой. Вернем успех.
    }
    return false;
  }


}