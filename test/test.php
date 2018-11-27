<?php

use App\Models\Person;

require_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';

#$data = Person::AddPerson('Вася', 'Иванов', '20');
#$data = Person::findById('10');

echo '<pre>';
var_dump($data);
echo '</pre>';