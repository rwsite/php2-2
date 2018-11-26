<?php

use App\Model;

require __DIR__ . '/autoload.php';

$data = \App\Models\Person::FindAll();

echo '<pre>';
var_dump($data);
echo '</pre>';