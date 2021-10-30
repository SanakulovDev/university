<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fakultet_dekan_movin".
 *
 * @property int $id
 * @property int|null $fakultet_id
 * @property int|null $dekan_id
 * @property string $muovin_ismi
 * @property string $muovin_familiyasi
 * @property string $qabul_vaqti
 * @property string|null $telefon
 * @property string|null $email
 * @property string|null $image
 * @property string|null $dekan_haqida
 *
 * @property FakultetDekan $dekan
 * @property Fakultetlar $fakultet
 */
class FakultetDekanMovin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultet_dekan_movin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultet_id', 'dekan_id'], 'integer'],
            [['muovin_ismi', 'muovin_familiyasi', 'qabul_vaqti'], 'required'],
            [['muovin_ismi', 'muovin_familiyasi', 'qabul_vaqti', 'image', 'dekan_haqida'], 'string', 'max' => 255],
            [['telefon'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 100],
            [['dekan_id'], 'exist', 'skipOnError' => true, 'targetClass' => FakultetDekan::className(), 'targetAttribute' => ['dekan_id' => 'id']],
            [['fakultet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultetlar::className(), 'targetAttribute' => ['fakultet_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fakultet_id' => Yii::t('app', 'Fakultet ID'),
            'dekan_id' => Yii::t('app', 'Dekan ID'),
            'muovin_ismi' => Yii::t('app', 'Muovin Ismi'),
            'muovin_familiyasi' => Yii::t('app', 'Muovin Familiyasi'),
            'qabul_vaqti' => Yii::t('app', 'Qabul Vaqti'),
            'telefon' => Yii::t('app', 'Telefon'),
            'email' => Yii::t('app', 'Email'),
            'image' => Yii::t('app', 'Image'),
            'dekan_haqida' => Yii::t('app', 'Dekan Haqida'),
        ];
    }

    /**
     * Gets query for [[Dekan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDekan()
    {
        return $this->hasOne(FakultetDekan::className(), ['id' => 'dekan_id']);
    }

    /**
     * Gets query for [[Fakultet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultet()
    {
        return $this->hasOne(Fakultetlar::className(), ['id' => 'fakultet_id']);
    }
}
