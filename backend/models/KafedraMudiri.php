<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kafedra_mudiri".
 *
 * @property int $id
 * @property int|null $kafedra_id
 * @property string $mudir_ismi
 * @property string $mudir_familiyasi
 * @property string $qabul_vaqti
 * @property string $telefon
 * @property string $email
 * @property string $image
 *
 * @property Kafedralar $kafedralar
 */
class KafedraMudiri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kafedra_mudiri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kafedra_id'], 'integer'],
            [['kafedra_id','mudir_ismi', 'mudir_familiyasi', 'qabul_vaqti', 'telefon', 'email', 'image'], 'required'],
            [['mudir_ismi', 'qabul_vaqti', 'telefon'], 'string', 'max' => 30],
            [['mudir_familiyasi', 'email'], 'string', 'max' => 50],
            [['image'], 'file','skipOnEmpty'=>true, 'extensions'=>['jpg', 'jpeg', 'png', 'svg']],
            [['kafedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kafedralar::className(), 'targetAttribute' => ['kafedra_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kafedra_id' => Yii::t('app', 'Kafedra ID'),
            'mudir_ismi' => Yii::t('app', 'Mudir Ismi'),
            'mudir_familiyasi' => Yii::t('app', 'Mudir Familiyasi'),
            'qabul_vaqti' => Yii::t('app', 'Qabul Vaqti'),
            'telefon' => Yii::t('app', 'Telefon'),
            'email' => Yii::t('app', 'Email'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * Gets query for [[Kafedra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKafedra()
    {
        return $this->hasOne(Kafedralar::className(), ['id' => 'kafedra_id']);
    }

    public function upload($image)
    {
        if ($image) {
            $dir = Yii::getAlias('@backend')."/web/uploads/kafedra/";
            $image_name = 'kafedra_mudiri_'.time();
            $image_name .= '.'.$image->extension;
            if ($image->saveAs($dir.$image_name)) {
                $this->image = $image_name;
                return true;
            }
        }

        return false;
    }
}
