<?php

namespace App\Models;


use App\Model;

class Article extends Model
{
  public $id;
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