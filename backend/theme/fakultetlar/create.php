<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Fakultetlar */

$this->title = Yii::t('app', 'Create Fakultetlar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultetlars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultetlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
