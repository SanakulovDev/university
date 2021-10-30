<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TalabaTuri */

$this->title = Yii::t('app', 'Create Talaba Turi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talaba Turis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talaba-turi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
