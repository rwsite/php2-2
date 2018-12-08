<?php

namespace App\Views;

use App\Db;
use App\Model;

class Admin
{
  protected static $data = null;
  protected static $result = null;


  public static function run()
  {

    $action = self::validate();
    $class = self::validate('class', 'html');

    if ($action === 'insert') {
      $title = self::validate('title', 'html', INPUT_POST);
      $img = self::validate('img', 'html', INPUT_POST);
      $content = self::validate('content', 'html', INPUT_POST);
      //  var_dump($title . '<br>' . $content );
      $obj = new $class($title, $content, $img);
      // var_dump($obj);
    } elseif ($action === 'save') {
      $id = (int)self::validate('id', 'int');
      $title = self::validate('title', 'html', INPUT_POST);
      $img = self::validate('img', 'html', INPUT_POST);
      $content = self::validate('content', 'html', INPUT_POST);

      $obj = $class::findById($id); //Поиск объекта для взаимодействия
      $obj->title = $title;
      $obj->thumbnail = $img;
      $obj->content = $content;

    } else {
      $id = (int)self::validate('id', 'int');
      if (!empty($id))
        $obj = $class::findById($id); //Поиск объекта для взаимодействия
    }
    if (!empty($obj)) {
      $result = $obj->$action(); // вызов функции, чье имя в переменной
      if ($result === true)
        $message = '<script>alert("Object ' . $obj->title . ' has be ' . $action . ' !");</script>';
      return $result;
    }
  }

  /**
   * @param string $action
   * @param string $type
   * @param int $method
   * @return mixed|null
   */
  public static function validate($action = 'action', $type = '', $method = INPUT_GET)
  {
    switch ($type) {
      /* case 'url':
         self::$data = filter_input($method, $action, FILTER_SANITIZE_ENCODED);// type , validate data ,
         break;*/
      case 'email':
        $data = filter_input($method, $action, FILTER_SANITIZE_EMAIL);
        break;
      case 'int':
        $data = filter_input($method, $action, FILTER_SANITIZE_NUMBER_INT); // return string
        break;
      case 'html':
        $data = filter_input($method, $action, FILTER_SANITIZE_SPECIAL_CHARS);
        break;
      default:
        $data = filter_input($method, $action, FILTER_SANITIZE_ENCODED);
        break;
    }
    return $data;
  }


  public function normalize($var)
  {

  }

}