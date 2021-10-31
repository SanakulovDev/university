<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Fanlar */
/* @var $form yii\widgets\ActiveForm */
$teacher_list = \common\models\Ustozlar::selectList()
?>

<div class="fanlar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ustozlar_id')->dropDownList($teacher_list,['prompt'=>"Ustozlarni tanlang"]) ?>

    <?= $form->field($model, 'fanlar_nomi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
