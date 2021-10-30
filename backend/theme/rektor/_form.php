<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Rektor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rektor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'familiyasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otasining_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qabul_vaqti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vazifalari')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
