<?php

namespace frontend\controllers;

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
        $teacher = $this->findTeacher($identity->id);
        $model = $this->findModel($identity->id);
        if ($model->type == 2)
            return $this->redirect('talaba');
        return $this->redirect('ustoz');

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
        $identity = Yii::$app->user->identity;
        $model = $this->findTalabaUp($id);
        if ($id == null)
            return $this->redirect('talaba-create');
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
        if (($model = Talabalar::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        return false;
    }

    protected function findTalabaUp($id)
    {
        if (($model = Talabalar::findOne(['id' => $id])) !== null) {
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



//    Teachers sections

    public function actionUstoz()
    {
        $identity = \Yii::$app->user->identity;
        if (!empty($identity->id)) {
            $model = $this->findTeacher($identity->id);
            return $this->render('ustoz', [
                'model' => $model
            ]);
        }
        return $this->redirect('/site/login');
    }
    public function actionUstozCreate()
    {
        $identity = \Yii::$app->user->identity;
        $model = new Ustozlar();
        if ($this->request->isPost && !empty($identity->id)) {

            $model->user_id = $identity->id;
            if ($model->load($this->request->post())) {
                $image = UploadedFile::getInstance($model, 'image');

                if ($model->upload($image) && $model->save()) {
                    return $this->redirect('ustoz');
                }
            }
        }
        return $this->render('ustoz-create', [
            'model' => $model,
        ]);
    }
    public function actionUstozUpdate($id = null){
        $model = $this->findTeacherUp($id);
        if ($id == null)
            return $this->redirect('ustoz-create');
        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if ($model->upload($image) && $model->save()) {
                return $this->redirect('ustoz');
            }
        }
        return $this->render('ustoz-update', [
            'model' => $model,
        ]);
    }

    protected function findTeacher($id)
    {
        if (($model = Ustozlar::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        return false;
    }
    protected function findTeacherUp($id)
    {
        if (($model = Ustozlar::findOne(['id' => $id])) !== null) {
            return $model;
        }
        return false;
    }

}