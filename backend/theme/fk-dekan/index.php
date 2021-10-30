<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FakultetDekanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fakultet Dekans');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultet-dekan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Fakultet Dekan'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fakultet_id',
            'dekan_ismi',
            'dekan_familiyasi',
            'qabul_vaqti',
            //'telefon',
            //'email:email',
            //'image',
            //'dekan_haqida',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
