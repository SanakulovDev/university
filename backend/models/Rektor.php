<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rektor".
 *
 * @property int $id
 * @property string $ismi
 * @property string $familiyasi
 * @property string $otasining_ismi
 * @property string $telefon
 * @property string $email
 * @property string $qabul_vaqti
 * @property string|null $vazifalari
 * @property string|null $image
 */
class Rektor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rektor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ismi', 'familiyasi', 'otasining_ismi', 'telefon', 'email', 'qabul_vaqti','image'], 'required'],
            [['ismi', 'telefon'], 'string', 'max' => 30],
            [['familiyasi','image', 'otasining_ismi'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 70],
            ['email', 'email'],
            [['qabul_vaqti'], 'string', 'max' => 40],
            [['vazifalari'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ismi' => Yii::t('app', 'Ismi'),
            'familiyasi' => Yii::t('app', 'Familiyasi'),
            'otasining_ismi' => Yii::t('app', 'Otasining Ismi'),
            'telefon' => Yii::t('app', 'Telefon'),
            'email' => Yii::t('app', 'Email'),
            'qabul_vaqti' => Yii::t('app', 'Qabul Vaqti'),
            'vazifalari' => Yii::t('app', 'Vazifalari'),
        ];
    }

    public function upload($image)
    {
        if ($image) {
            $dir = Yii::getAlias('@backend')."/web/uploads/rektor/";
            $image_name = 'rektor_'.time();
            $image_name .= '.'.$image->extension;
            if ($image->saveAs($dir.$image_name)) {
                $this->image = $image_name;
                return true;
            }
        }

        return false;
    }
}
