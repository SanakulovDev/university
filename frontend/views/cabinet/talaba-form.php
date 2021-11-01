<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Talabalar */
/* @var $form yii\widgets\ActiveForm */
$fakultet_list = \backend\models\Fakultetlar::selectList();
$guruh_list = [];
$uqish_turi = \backend\models\UqishTuri::selectList();
$talaba_turi = \backend\models\TalabaTuri::selectList();
?>

<div class="talabalar-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'fakultet_id')->dropDownList($fakultet_list,['prompt'=>"Fakultetni tanlang"]) ?>

    <?= $form->field($model, 'guruh_id')->dropDownList($guruh_list,['prompt'=>"Guruhni tanlang"]) ?>

    <?= $form->field($model, 'talaba_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'talaba_familiyasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'talaba_otasining_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'uqish_turi_id')->dropDownList($uqish_turi,['prompt'=>"O'qish turini tanlang"]) ?>

    <?= $form->field($model, 'talaba_turi_id')->dropDownList($talaba_turi,['prompt'=>'Talaba turini tanlang']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
