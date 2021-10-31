<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Talabalar */

$this->title = Yii::t('app', 'Create Talabalar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talabalars'), 'url' => ['talaba']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talabalar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('talaba-form', [
        'model' => $model,
    ]) ?>

</div>
