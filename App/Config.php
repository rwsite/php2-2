<?php

namespace App;


use App\Models\HasRead;
use App\Models\HasSave;

class Config implements HasRead, HasSave
{
  private static $_instance = null;

  private static $db = 'profit';
  private static $host = 'localhost';
  private static $user = 'mysql';
  private static $password = 'mysql';

  private function __construct()
  {
    self::$_instance = $this->getData();
  }

  private function __clone()
  {
    // ограничивает клонирование объекта
  }

  public function __wakeup()
  {
    // Одиночки не должны быть восстанавливаемыми из строк.
  }


  public static function getInstance()
  {
    if (self::$_instance != null) {
      return self::$_instance;
    }
    return new self;
  }

  public function getData()
  {
    $data = [ self::$db, self::$host, self::$user, self::$password ];
    return $data;
  }

  public function getConnection()
  {
    //
  }

}