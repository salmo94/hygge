<?php

use backend\models\CategorySearch;
use common\models\Category;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

/**
 * @var $searchModel CategorySearch
 * @var $dataProvider ActiveDataProvider
 * @var $categories array
 */

$this->title = 'Category list';

echo Html::a('Створити категорію','create',['class' => 'mb-2 btn btn-primary']);

echo GridView::widget([
    'filterModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'title',
        'description',
        ['attribute' => 'status',
            'filter' => [0 => 'заблокована', 1 => 'активна'],
            'value' => function (Category $category) {
                if ($category->status === 1) {
                    return 'активна';
                }
                return 'заблокована';
            },
            'filterInputOptions' => ['prompt' => 'виберіть статус', 'class' => 'form-control',]
        ],
        ['attribute' => 'parent_id',
            'filter' => $categories,
            'value' => function (Category $category) {
               return $category->parent->title ?? null;
            },
            'filterInputOptions' => ['prompt' => 'select...', 'class' => 'form-control',]
        ],
        [ 'class' => 'yii\grid\ActionColumn',
            'template' => '{view}{update}{delete}',

            ],
    ]
]);
