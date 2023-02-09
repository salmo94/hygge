<?php
use common\models\Good;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var $good Good
 * @var $category Good
 */
?>


<?php
echo Html::a('Назад','index',['class' => ' mb-2 btn btn-primary']);
echo DetailView::widget([
    'model' => $good,
    'attributes' => [
        [
            'label' => 'ID',
            'value' => $good->id,
        ],
        [
            'label' => 'Назва',
            'value' => $good->title,
        ],
        [
            'label' => 'Опис',
            'value' => $good->description,
        ],
        [
            'label' => 'Ціна',
            'value' => $good->price,
        ],
        [
            'label' => 'Артикул',
            'value' => $good->article,
        ],
        [
            'label' => 'Статус',
            'value' => $good->status,
        ],
        [
            'label' => 'Категорія товару',
            'value' => $good->category->title ?? 'немає',
        ],
        [
            'label' => 'Наявність',
            'value' => $good->is_available,
        ],
        [
            'label' => 'Дата створення',
            'value' => $good->created_at,
        ],
        [
            'label' => 'Дата оновлення',
            'value' => $good->updated_at ?? 'не оновлювалась',
        ]
    ]
]);
?>
