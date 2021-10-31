<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Talabalar */

$this->title = Yii::t('app', 'Create Talabalar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talabalars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talabalar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
