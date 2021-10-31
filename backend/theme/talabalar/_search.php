<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TalabalarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="talabalar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fakultet_id') ?>

    <?= $form->field($model, 'guruh_id') ?>

    <?= $form->field($model, 'talaba_ismi') ?>

    <?= $form->field($model, 'talaba_familiyasi') ?>

    <?php // echo $form->field($model, 'talaba_otasining_ismi') ?>

    <?php // echo $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'uqish_turi_id') ?>

    <?php // echo $form->field($model, 'talaba_turi_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
