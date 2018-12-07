<?php

namespace App\Models;


use App\Model;

class Article extends Model
{

  protected static $table = 'articles';

  //public $id; - уже объявлено в модели

  public $title;
  public $content;
  public $thumbnail;

  public function __construct($title = null, $content = null, $thumbnail = null)
  {
    $this->title = $title ?? $this->title;
    $this->content = $content ?? $this->content;
    $this->thumbnail = $thumbnail ?? $this->thumbnail;
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