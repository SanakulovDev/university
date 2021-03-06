<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FakultetGuruhlari */
/* @var $form yii\widgets\ActiveForm */
$fakultet_list = \backend\models\Fakultetlar::selectList();
?>

<div class="fakultet-guruhlari-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fakultet_id')->dropDownList($fakultet_list,['prompt'=>"Fakultetni tanlang"]) ?>

    <?= $form->field($model, 'guruh_raqami')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
