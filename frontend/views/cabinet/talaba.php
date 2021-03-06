<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Talabalar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talabalars'), 'url' => ['talaba']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="talabalar-view">

    <h1><?= ucfirst(Yii::$app->user->identity->username)  ?> Talaba ma'lumotlari </h1>


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
                'value' => '/web/uploads/talabalar/' . $model->image,
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

    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['talaba-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

</div>
