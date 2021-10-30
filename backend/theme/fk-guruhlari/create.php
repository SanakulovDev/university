<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FakultetGuruhlari */

$this->title = Yii::t('app', 'Create Fakultet Guruhlari');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultet Guruhlaris'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultet-guruhlari-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
