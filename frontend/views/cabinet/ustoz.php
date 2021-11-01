<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ustozlar */

$this->title = ucfirst($model->user->username).' ustoz ma`lumotlari';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ustozlars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ustozlar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => $model->user->username
            ],
            [
                'attribute' => 'kafedra_id',
                'value' => $model->kafedra->kafedra_nomi
            ],
            'ismi',
            'familiyasi',
            'telefon',
            [
                    'attribute'=>'image',
                'value'=>'frontend/web/uploads/ustozlar' . $model->image,
                'format'=>['image',['width'=>150, 'height'=>150]]
            ]
        ],
    ]) ?>
    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['ustoz-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>
</div>
