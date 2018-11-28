<?php

use App\Models\Person;

require_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';

// добавить запись
#$data = Person::AddPerson('Вася', 'Иванов', '20');

// получить запись
$data = Person::findById('1');

echo '<pre>';
var_dump($data);
echo '</pre>';