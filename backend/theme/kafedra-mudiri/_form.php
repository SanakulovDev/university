<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KafedraMudiri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kafedra-mudiri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kafedra_id')->textInput() ?>

    <?= $form->field($model, 'mudir_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mudir_familiyasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qabul_vaqti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
