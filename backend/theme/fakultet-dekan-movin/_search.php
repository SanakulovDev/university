<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FakultetDekanMovinSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fakultet-dekan-movin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fakultet_id') ?>

    <?= $form->field($model, 'dekan_id') ?>

    <?= $form->field($model, 'muovin_ismi') ?>

    <?= $form->field($model, 'muovin_familiyasi') ?>

    <?php // echo $form->field($model, 'qabul_vaqti') ?>

    <?php // echo $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'dekan_haqida') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
