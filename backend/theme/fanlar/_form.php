<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fanlar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fanlar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ustozlar_id')->textInput() ?>

    <?= $form->field($model, 'fanlar_nomi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
