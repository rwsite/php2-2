<?php


namespace App\Models;

use App\Model;

class Person extends Model
{
  protected static $table = 'persons';

    public $LastName;
    public $FirstName;
    public $Age;

}