<?php
use backend\models\GoodSearch;
use common\models\Good;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/**
 * @var $searchModel GoodSearch
 * @var $dataProvider ActiveDataProvider
 * @var $category Good
 * @var $good Good
 * @var $categories array
 */
 $this->title = 'Good list';
?>

<?php
echo Html::a('Створити категорію','create',['class' => 'mb-2 btn btn-primary']);
echo GridView::widget([
    'filterModel' => $searchModel,
    'dataProvider' => $dataProvider,
     'columns' =>[
         'id',
      'title',
      'description',
      'price',
      'article',
        'category_id',
         ['attribute' => 'status',
             'filter' => [0 => 'заблокована', 1 => 'активна'],
             'value' => function (Good $good) {
              if ($good->status === 1) {
               return 'активна';
              }
              return 'заблокована';
             },
             'filterInputOptions' => ['prompt' => 'виберіть статус', 'class' => 'form-control',]
         ], ['attribute' => 'is_available',
             'filter' => [false => 'не доступний', true => 'доступний'],
             'value' => function (Good $good) {
              if ($good->is_available === true) {
               return 'доступний';
              }
              return 'не доступний';
             },
             'filterInputOptions' => ['prompt' => 'виберіть наявність', 'class' => 'form-control',]
         ],
         [ 'class' => 'yii\grid\ActionColumn',
             'template' => '{view}{update}{delete}',
         ],
]]);
?>
