<?php


use App\Config;

require_once dirname(__DIR__) . '/autoload.php';

/**
 * добавить запись
 */
#$data = \App\Models\Person::AddPerson('Дима', 'Васин', 20 );

/**
 * получить запись
 */
#$data = Person::findById('1');

/**
 * Получить данные конфига
 */
$config = Config::getInstance();
$data = $config->getData();

/*
$data = new \App\Models\Product('Сапоги', '1', '1', 'Сапоги резиновые', '0');
$result = $data->insert();
*/

echo '<h1>Тестовая страница</h1>';

/*
 * Найти объект, изменить свойства - сохранить
$data = \App\Models\Product::findById(3);
$data->id = 15;
$data->price = 4000;
$result = $data->save();
*/

/*
$data = \App\Models\Product::findById(20);
$data->price = 4000;
$result = $data->delete();
*/

/**
 * Добавить запись через Active Record
 */
$data = new App\Models\Article('sdfsdf', 'sdfsdf', 'sdfsdfs');
$result = $data->save(); // универсальный метод
$data = App\Models\Article::findAll();

echo '<pre>';
var_dump($data);
echo '<br>';
echo '</pre>';