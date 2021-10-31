<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kafedralar */
/* @var $form yii\widgets\ActiveForm */
$falkultet_list = \backend\models\Fakultetlar::selectList();
?>

<div class="kafedralar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kafedra_nomi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fakultet_id')->dropDownList($falkultet_list,['prompt'=>"Fakultetni tanlang"]) ?>

    <?= $form->field($model, 'fakultet_haqida')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
