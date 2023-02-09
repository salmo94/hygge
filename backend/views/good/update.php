<?php

use common\models\Good;

/**
 * @var $good Good
 * @var $categories
 */


 $this->title = 'Update page';
 ?>


<?= $this->render('form',[
    'good' => $good,
    'categories' => $categories,
])
?>
