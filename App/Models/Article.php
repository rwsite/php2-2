<?php

namespace App\Models;


use App\Model;

class Article extends Model
{

  protected static $table = 'article';

  //public $id; - уже объявлено в модели
  public $title;
  public $content;
  public $thumbnail;

  public function __construct()
  {

  }

  /**
   * @return mixed
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * @return mixed
   */
  public function getContent()
  {
    return $this->content;
  }
}