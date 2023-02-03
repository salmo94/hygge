<?php

use common\models\Category;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var $category Category
 * @var $parentCategory Category
 */

?>


<?php

echo DetailView::widget([
    'model' => $category,
    'attributes' => [
        [
            'label' => 'ID',
            'value' => $category->id,
        ],
        [
            'label' => 'Назва категорії',
            'value' => $category->title,
        ],
        [
            'label' => 'Опис',
            'value' => $category->description,
        ],
        [
            'label' => 'Статус',
            'value' => $category->status ?? 'не вказано',
        ],
        [
            'label' => 'Батьківська категорія',
            'value' => $category->parent->title ?? 'не задано',
        ],
        [
            'label' => 'Дата створення',
            'value' => $category->created_at,
        ],
    ],
]);
?>
