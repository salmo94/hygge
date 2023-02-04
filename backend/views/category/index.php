<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/**
 * @var $searchModel \backend\models\CategorySearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $categories array
 */

$this->title = 'Category list';

echo \yii\helpers\Html::a('Створити категорію','create',['class' => 'btn btn-primary']);

echo \yii\grid\GridView::widget([
    'filterModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'title',
        'description',
        ['attribute' => 'status',
            'filter' => [0 => 'заблокована', 1 => 'активна'],
            'value' => function (\common\models\Category $category) {
                if ($category->status === 1) {
                    return 'активна';
                }
                return 'заблокована';

            },
            'filterInputOptions' => ['prompt' => 'виберіть статус', 'class' => 'form-control',]
        ],
        ['attribute' => 'parent_id',
            'filter' => $categories,
            'value' => function (\common\models\Category $category) {
               return $category->parent->title ?? null;
            },
            'filterInputOptions' => ['prompt' => 'select...', 'class' => 'form-control',]
        ],
        [ 'class' => 'yii\grid\ActionColumn',
            'template' => '{view}{update}',
            ],
    ]
]);
