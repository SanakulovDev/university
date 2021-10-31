<?php

namespace backend\models;

use common\models\Ustozlar;
use Yii;

/**
 * This is the model class for table "fanlar".
 *
 * @property int $id
 * @property int|null $ustozlar_id
 * @property string $fanlar_nomi
 *
 * @property Ustozlar $ustozlar
 */
class Fanlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fanlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ustozlar_id'], 'integer'],
            [['fanlar_nomi'], 'required'],
            [['fanlar_nomi'], 'string', 'max' => 100],
            [['ustozlar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ustozlar::className(), 'targetAttribute' => ['ustozlar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ustozlar_id' => Yii::t('app', 'Ustozlar ID'),
            'fanlar_nomi' => Yii::t('app', 'Fanlar Nomi'),
        ];
    }

    /**
     * Gets query for [[Ustozlar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUstozlar()
    {
        return $this->hasOne(Ustozlar::className(), ['id' => 'ustozlar_id']);
    }


}
