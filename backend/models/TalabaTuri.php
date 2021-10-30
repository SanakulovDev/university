<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "talaba_turi".
 *
 * @property int $id
 * @property string $nomi
 *
 * @property Talabalar[] $talabalars
 */
class TalabaTuri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'talaba_turi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi'], 'required'],
            [['nomi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nomi' => Yii::t('app', 'Nomi'),
        ];
    }

    /**
     * Gets query for [[Talabalars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTalabalars()
    {
        return $this->hasMany(Talabalar::className(), ['talaba_turi_id' => 'id']);
    }
}
