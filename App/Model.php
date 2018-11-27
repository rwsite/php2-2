<?php

namespace App;


abstract class Model
{
  protected static $table = 'persons';//защищенное статическое свойсво, можно заменить на константу

  public $id;

  /**
   * Нельзя использовать $this.
   * Вызов статического метода
   * Model::FindAll();
   */
  public static function FindAll()
  {
    $db = new Db;
    $sql = 'SELECT * FROM ' . static::$table ;
    return $db->query($sql, [], static::class);
    // self - Имя текущего класа.
    // Static - имя класса, где вызывается во время выполнения
  }

  public static function findById($id)
  {
    $db = new Db;
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
    return $db->query($sql, [':id' => $id], static::class);
  }

  public static function AddPerson($f_name = 'John', $l_name = 'Doe', $age = '')
  {
    $db = new Db;
    $sql = 'INSERT INTO ' . static::$table . '(`LastName`,`FirstName`,`Age`)' . 'VALUES (:f_name, :l_name, :age)';
    return $db->query_add($sql, [':f_name' => $f_name, ':l_name' => $l_name, ':age' => $age], static::class);
  }



}