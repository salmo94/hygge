<?php

use common\models\Good;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var $good Good
 * @var $categories
 */
?>

<div class="form">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?> </h1>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($good, 'title')->textInput() ?>
        <?= $form->field($good, 'description')->textarea() ?>
        <?= $form->field($good, 'price')->textInput() ?>
        <?= $form->field($good, 'article')->textInput() ?>
        <?= $form->field($good, 'status')->dropDownList([0 => 'заблокована', 1 => 'активна'], ['value' => 1]) ?>
        <?= $form->field($good, 'category_id')->dropDownList($categories, ['prompt' => 'select category']) ?>
        <?= $form->field($good, 'is_available')->checkbox(['checked' => true]) ?>
        <?= $form->field($good, 'imageFiles[]')->fileInput(['multiple' => true,]) ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block']) ?>
            <?php echo \yii\helpers\Html::a('Назад', 'index', ['class' => '  btn btn-success']); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
