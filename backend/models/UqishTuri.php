<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "uqish_turi".
 *
 * @property int $id
 * @property string $nomi
 *
 * @property Talabalar[] $talabalars
 */
class UqishTuri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uqish_turi';
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
        return $this->hasMany(Talabalar::className(), ['uqish_turi_id' => 'id']);
    }
}