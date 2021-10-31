<?php

namespace frontend\controllers;


use backend\models\FakultetGuruhlari;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function actionGuruh($id)
    {
        $guruhlar = FakultetGuruhlari::find()->where(['fakultet_id' => $id])->all();
        foreach ($guruhlar as $item) {
            $data .= "<option value={$item->id}>{$item->guruh_raqami}</option>";
        }
        return $data;
    }
}