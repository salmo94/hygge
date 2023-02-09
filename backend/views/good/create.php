<?php
use common\models\Good;


/**
 * @var $good Good
 * @var  $categories
 */


$this->title = 'Create good'

?>

<?= $this->render('form',[
    'good' => $good,
    'categories' => $categories,

]) ?>