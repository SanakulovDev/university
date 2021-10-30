<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FakultetDekanMovin */

$this->title = Yii::t('app', 'Create Fakultet Dekan Movin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultet Dekan Movins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultet-dekan-movin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
