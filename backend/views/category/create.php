<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use common\models\Category;

/* @var $category Category */

$this->title = 'Create category';
?>
<div class="form">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($category, 'title')->textInput() ?>
        <?= $form->field($category, 'description')->textarea() ?>
        <?= $form->field($category, 'status')->dropDownList([0 => 'заблокована', 1 => 'активна']) ?>
        <?= $form->field($category, 'is_available')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-primary btn-block']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

