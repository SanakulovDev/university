<?php

namespace backend\models;

use common\models\Talabalar;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "fakultet_guruhlari".
 *
 * @property int $id
 * @property int|null $fakultet_id
 * @property string $guruh_raqami
 *
 * @property Fakultetlar $fakultet
 * @property Talabalar[] $talabalars
 */
class FakultetGuruhlari extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultet_guruhlari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultet_id'], 'integer'],
            [['guruh_raqami'], 'required'],
            [['guruh_raqami'], 'string', 'max' => 15],
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
            'guruh_raqami' => Yii::t('app', 'Guruh Raqami'),
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
     * Gets query for [[Talabalars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTalabalars()
    {
        return $this->hasMany(Talabalar::className(), ['guruh_id' => 'id']);
    }
    public static function selectList($guruh_id = null) {
        $condition =[];
        if ($guruh_id){
            $condition = ['fakultet_id' => $guruh_id];
        }
        return ArrayHelper::map(self::find()->where($condition)->all(), 'id', Yii::t('app', 'gurruh_raqami'));
    }
}
