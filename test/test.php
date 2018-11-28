<?php

use App\Models\Person;

require_once dirname(__DIR__) . '/autoload.php';

// добавить запись
#$data = Person::AddPerson('Вася', 'Петров', '20');

// получить запись
#$data = Person::findById('1');


echo '<h1>Тестовая страница</h1>';

echo '<pre>';
var_dump($data);
echo '</pre>';