<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UqishTuri */

$this->title = Yii::t('app', 'Create Uqish Turi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Uqish Turis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uqish-turi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
