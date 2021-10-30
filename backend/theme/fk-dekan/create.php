<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FakultetDekan */

$this->title = Yii::t('app', 'Create Fakultet Dekan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultet Dekans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultet-dekan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
