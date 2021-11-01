<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ustozlar */

$this->title = Yii::t('app', 'Create Ustozlar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ustozlars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ustozlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('ustoz-form', [
        'model' => $model,
    ]) ?>

</div>
