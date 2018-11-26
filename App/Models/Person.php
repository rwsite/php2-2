<?php


namespace App\Models;

use App\Model;

class Person extends Model
{
    protected static $table_name = 'persons';

    public $id;
    public $LastName;
    public $FirstName;
    public $Age;


}