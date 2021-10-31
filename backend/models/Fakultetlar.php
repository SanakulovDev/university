<?php

namespace backend\models;

use common\models\Talabalar;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "fakultetlar".
 *
 * @property int $id
 * @property string $fakultet_nomi
 * @property string|null $fakultet_haqida
 *
 * @property FakultetDekanMovin[] $fakultetDekanMovins
 * @property FakultetDekan[] $fakultetDekans
 * @property FakultetGuruhlari[] $fakultetGuruhlaris
 * @property Kafedralar[] $kafedralars
 * @property Talabalar[] $talabalars
 */
class Fakultetlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultetlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultet_nomi'], 'required'],
            [['fakultet_nomi'], 'string', 'max' => 100],
            [['fakultet_haqida'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fakultet_nomi' => Yii::t('app', 'Fakultet Nomi'),
            'fakultet_haqida' => Yii::t('app', 'Fakultet Haqida'),
        ];
    }

    /**
     * Gets query for [[FakultetDekanMovins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultetDekanMovins()
    {
        return $this->hasMany(FakultetDekanMovin::className(), ['fakultet_id' => 'id']);
    }

    /**
     * Gets query for [[FakultetDekans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultetDekans()
    {
        return $this->hasMany(FakultetDekan::className(), ['fakultet_id' => 'id']);
    }

    /**
     * Gets query for [[FakultetGuruhlaris]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultetGuruhlaris()
    {
        return $this->hasMany(FakultetGuruhlari::className(), ['fakultet_id' => 'id']);
    }

    /**
     * Gets query for [[Kafedralars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKafedralars()
    {
        return $this->hasMany(Kafedralar::className(), ['fakultet_id' => 'id']);
    }

    /**
     * Gets query for [[Talabalars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTalabalars()
    {
        return $this->hasMany(Talabalar::className(), ['fakultet_id' => 'id']);
    }

    public static function selectList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'fakultet_nomi');
    }
}
