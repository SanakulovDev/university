<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KafedraMudiri */
/* @var $form yii\widgets\ActiveForm */

$kafedra_list = \backend\models\Kafedralar::selectList();
?>

<div class="kafedra-mudiri-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'kafedra_id')->dropDownList($kafedra_list,['prompt'=>"Kafedrani tanlang"]) ?>

    <?= $form->field($model, 'mudir_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mudir_familiyasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qabul_vaqti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
