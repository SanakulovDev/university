<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FakultetDekan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fakultet-dekan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fakultet_id')->textInput() ?>

    <?= $form->field($model, 'dekan_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dekan_familiyasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qabul_vaqti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dekan_haqida')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
