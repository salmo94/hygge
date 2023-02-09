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

?>
<div class="form">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($category, 'title')->textInput() ?>
        <?= $form->field($category, 'description')->textarea() ?>
        <?= $form->field($category, 'parent_id')->dropDownList($categories, ['prompt' => 'select parent']) ?>
        <?= $form->field($category, 'status')->dropDownList([0 => 'заблокована', 1 => 'активна'], ['value' => 1]) ?>
        <?= $form->field($category, 'is_available')->checkbox(['checked' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block']) ?>
            <?php echo \yii\helpers\Html::a('Назад', 'index', ['class' => '  btn btn-success']); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
