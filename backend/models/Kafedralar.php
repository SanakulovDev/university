<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "kafedralar".
 *
 * @property int $id
 * @property string|null $kafedra_nomi
 * @property int|null $fakultet_id
 * @property string $fakultet_haqida
 *
 * @property Fakultetlar $fakultet
 * @property KafedraMudiri[] $kafedraMudiris
 */
class Kafedralar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kafedralar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultet_id'], 'integer'],
            [['fakultet_haqida'], 'required'],
            [['kafedra_nomi'], 'string', 'max' => 100],
            [['fakultet_haqida'], 'string', 'max' => 255],
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
            'kafedra_nomi' => Yii::t('app', 'Kafedra Nomi'),
            'fakultet_id' => Yii::t('app', 'Fakultet ID'),
            'fakultet_haqida' => Yii::t('app', 'Fakultet Haqida'),
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
     * Gets query for [[KafedraMudiris]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKafedraMudiris()
    {
        return $this->hasMany(KafedraMudiri::className(), ['kafedra_id' => 'id']);
    }
    public static function selectList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'kafedra_nomi');
    }
}
