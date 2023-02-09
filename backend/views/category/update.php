<?php

use common\models\Category;


/**
* @var $category Category
*/
/**
* @var $categories
*/

$this->title = 'Update category';
?>

<?= $this->render('form',[
    'category' => $category,
    'categories' => $categories,
]) ?>
