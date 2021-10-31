<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Talabalar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="talabalar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fakultet_id')->textInput() ?>

    <?= $form->field($model, 'guruh_id')->textInput() ?>

    <?= $form->field($model, 'talaba_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'talaba_familiyasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'talaba_otasining_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uqish_turi_id')->textInput() ?>

    <?= $form->field($model, 'talaba_turi_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
