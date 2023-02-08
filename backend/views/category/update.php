<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
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
