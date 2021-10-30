<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KafedraMudiri */

$this->title = Yii::t('app', 'Create Kafedra Mudiri');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kafedra Mudiris'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kafedra-mudiri-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
