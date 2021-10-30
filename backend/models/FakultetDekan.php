<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fakultet_dekan".
 *
 * @property int $id
 * @property int|null $fakultet_id
 * @property string $dekan_ismi
 * @property string $dekan_familiyasi
 * @property string $qabul_vaqti
 * @property string|null $telefon
 * @property string|null $email
 * @property string|null $image
 * @property string|null $dekan_haqida
 *
 * @property Fakultetlar $fakultet
 * @property FakultetDekanMovin[] $fakultetDekanMovins
 */
class FakultetDekan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultet_dekan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultet_id'], 'integer'],
            [['dekan_ismi', 'dekan_familiyasi', 'qabul_vaqti'], 'required'],
            [['dekan_ismi', 'dekan_familiyasi', 'qabul_vaqti', 'image', 'dekan_haqida'], 'string', 'max' => 255],
            [['telefon'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 100],
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
            'dekan_ismi' => Yii::t('app', 'Dekan Ismi'),
            'dekan_familiyasi' => Yii::t('app', 'Dekan Familiyasi'),
            'qabul_vaqti' => Yii::t('app', 'Qabul Vaqti'),
            'telefon' => Yii::t('app', 'Telefon'),
            'email' => Yii::t('app', 'Email'),
            'image' => Yii::t('app', 'Image'),
            'dekan_haqida' => Yii::t('app', 'Dekan Haqida'),
        ];
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

    /**
     * Gets query for [[FakultetDekanMovins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultetDekanMovins()
    {
        return $this->hasMany(FakultetDekanMovin::className(), ['dekan_id' => 'id']);
    }
}
