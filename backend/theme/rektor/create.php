<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rektor */

$this->title = Yii::t('app', 'Create Rektor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rektors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rektor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
