<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ustozlar */
/* @var $form yii\widgets\ActiveForm */
$kafedra_list = \backend\models\Kafedralar::selectList();
?>

<div class="ustozlar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kafedra_id')->dropDownList($kafedra_list, ['prompt'=>'Kafedrani tanlang']) ?>

    <?= $form->field($model, 'ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'familiyasi')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'telefon')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '99-999-99-99',
    ]) ?>

    <?= $form->field($model,'image')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
