<?php


use common\models\Category;


/**
 * @var $category Category
 * @var $categories
 * @var $this \yii\web\View
 */

$this->title = 'Create category';

?>
<?= $this->render('form',[
    'category' => $category,
    'categories' => $categories,
]) ?>