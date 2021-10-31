<?php

namespace common\models;

use backend\models\Fanlar;
use backend\models\Kafedralar;
use Yii;

/**
 * This is the model class for table "ustozlar".
 *
 * @property int $id
 * @property int|null $kafedra_id
 * @property string $ismi
 * @property string $familiyasi
 * @property string $telefon
 * @property integer $user_id
 * @property Fanlar[] $fanlars
 * @property Kafedralar $kafedra
 */
class Ustozlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ustozlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kafedra_id','user_id'], 'integer'],
            [['ismi', 'familiyasi', 'telefon'], 'required'],
            [['ismi'], 'string', 'max' => 25],
            [['familiyasi'], 'string', 'max' => 40],
            [['telefon'], 'string', 'max' => 30],
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
            'ismi' => Yii::t('app', 'Ismi'),
            'familiyasi' => Yii::t('app', 'Familiyasi'),
            'telefon' => Yii::t('app', 'Telefon'),
            'user_id'=>Yii::t('app','User ID')
        ];
    }

    /**
     * Gets query for [[Fanlars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFanlars()
    {
        return $this->hasMany(Fanlar::className(), ['ustozlar_id' => 'id']);
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
}
