<?php
/**
 * general file Admin panel
 */


require_once __DIR__ . '/autoload.php';

/** Все переменные шаблона */
$title = 'Панель управления';
$subtitle = $cur_page = 'Публикации';

use App\Views\Admin;

$result = Admin::run();

if ($result === true) {
  header('Location: admin.php');
} elseif ($result === false) {
  echo 'Ошибка!';
}



$articles = App\Models\Article::FindAll();

$class = App\Models\Article::class;
$columns = get_class_vars(App\Models\Article::class);// Class vars

$articles = array_reverse($articles);


/*echo '<pre>';
var_dump($articles);
echo '</pre>';*/

require_once __DIR__ . '/App/Templates/admin.php';