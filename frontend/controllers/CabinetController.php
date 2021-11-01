<?php

namespace frontend\controllers;

use common\models\Talaba;
use common\models\Talabalar;
use common\models\User;
use common\models\Ustozlar;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class CabinetController extends Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        $identity = Yii::$app->user->identity;
        $talaba = $this->findTalaba($identity->id);
        $teacher = $this->findTeacher($identity->id);
        $model = $this->findModel($identity);
        if ($model)
            return $this->redirect('talaba');
        if ($teacher)
            return $this->redirect('ustoz');


        return $this->render('index',[
            'talaba'=>$talaba,
            'teacher'=>$teacher
        ]);
    }
    public function actionTalaba()
    {
        $identity = \Yii::$app->user->identity;
        if (!empty($identity->id)) {
            $model = $this->findTalaba($identity->id);
            return $this->render('talaba', [
                'model' => $model
            ]);
        }
        return $this->redirect('/site/login');
    }

    public function actionTalabaCreate()
    {
        $identity = \Yii::$app->user->identity;

            $model = new Talabalar();
            if ($this->request->isPost && !empty($identity->id)) {

                $model->user_id = $identity->id;
                if ($model->load($this->request->post())) {
                    $image = UploadedFile::getInstance($model, 'image');
                    if ($model->upload($image) && $model->save()) {
                        return $this->redirect('talaba');
                    }
                }
            }
        return $this->render('talaba-create', [
            'model' => $model,
        ]);
    }

    public function actionTalabaUpdate($id = null)
    {
        $identity=  Yii::$app->user->identity;
        $model = $this->findTalaba($id);
        if ($id == null)
            return $this->redirect('/cabinet/talaba-create');
        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if ($model->upload($image) && $model->save()) {
                return $this->redirect(['talaba', 'id' => $id]);
            }
        }
        return $this->render('talaba-update', [
            'model' => $model,
        ]);
    }

    protected function findTalaba($id)
    {
        if (($model = Talabalar::findOne(['id' => $id])) !== null) {
            return $model;
        }
        return false;
    }
    protected function findTeacher($id)
    {
        if (($model = Ustozlar::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        return false;
    }
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }
        return false;
    }
}