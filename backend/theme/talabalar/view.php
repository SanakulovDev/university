<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Talabalar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talabalars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="talabalar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => $model->user->username
            ],
            [
                'attribute' => 'fakultet_id',
                'value' => $model->fakultet->fakultet_nomi
            ],
            [
                'attribute' => 'guruh_id',
                'value' => $model->guruh->guruh_raqami
            ],
            'talaba_ismi',
            'talaba_familiyasi',
            'talaba_otasining_ismi',
            'telefon',
            [
                'attribute' => 'image',
                'value' => Yii::getAlias('@frontend').'/web/uploads/talabalar/' . $model->image,
                'format' => ['image', ['width' => '150', 'height' => '150']]
            ],
            [
                'attribute' => 'uqish_turi_id',
                'value' => $model->uqishTuri->nomi
            ],
            [
                'attribute' => 'talaba_turi_id',
                'value' => $model->talabaTuri->nomi
            ],

        ],
    ]) ?>

</div>
