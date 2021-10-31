<?php

namespace common\models;

use backend\models\FakultetGuruhlari;
use backend\models\Fakultetlar;
use backend\models\TalabaTuri;
use backend\models\UqishTuri;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "talabalar".
 *
 * @property int $id
 * @property int|null $fakultet_id
 * @property int|null $guruh_id
 * @property string $talaba_ismi
 * @property string $talaba_familiyasi
 * @property string $talaba_otasining_ismi
 * @property string $telefon
 * @property string $image
 * @property int|null $uqish_turi_id
 * @property int|null $talaba_turi_id
 * @property int|null $user_id
 * @property Fakultetlar $fakultet
 * @property FakultetGuruhlari $guruh
 * @property TalabaTuri $talabaTuri
 * @property UqishTuri $uqishTuri
 */
class Talabalar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'talabalar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultet_id', 'guruh_id', 'uqish_turi_id', 'talaba_turi_id', 'user_id'], 'integer'],
            [['talaba_ismi', 'talaba_familiyasi', 'talaba_otasining_ismi', 'telefon', 'image'], 'required'],
            [['talaba_ismi'], 'string', 'max' => 50],
            [['talaba_familiyasi'], 'string', 'max' => 100],
            [['talaba_otasining_ismi'], 'string', 'max' => 70],
            [['telefon'], 'string', 'max' => 30],
            ['image', 'file', 'skipOnEmpty' => true,  'extensions' => 'png, jpg, jpeg, svg, ttif'],
            [['talaba_turi_id'], 'exist', 'skipOnError' => true, 'targetClass' => TalabaTuri::className(), 'targetAttribute' => ['talaba_turi_id' => 'id']],
            [['fakultet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultetlar::className(), 'targetAttribute' => ['fakultet_id' => 'id']],
            [['guruh_id'], 'exist', 'skipOnError' => true, 'targetClass' => FakultetGuruhlari::className(), 'targetAttribute' => ['guruh_id' => 'id']],
            [['uqish_turi_id'], 'exist', 'skipOnError' => true, 'targetClass' => UqishTuri::className(), 'targetAttribute' => ['uqish_turi_id' => 'id']],
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
            'guruh_id' => Yii::t('app', 'Guruh ID'),
            'talaba_ismi' => Yii::t('app', 'Talaba Ismi'),
            'talaba_familiyasi' => Yii::t('app', 'Talaba Familiyasi'),
            'talaba_otasining_ismi' => Yii::t('app', 'Talaba Otasining Ismi'),
            'telefon' => Yii::t('app', 'Telefon'),
            'image' => Yii::t('app', 'Image'),
            'uqish_turi_id' => Yii::t('app', 'Uqish Turi ID'),
            'talaba_turi_id' => Yii::t('app', 'Talaba Turi ID'),
            'user_id' => Yii::t('app', 'User Id')
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
     * Gets query for [[Guruh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuruh()
    {
        return $this->hasOne(FakultetGuruhlari::className(), ['id' => 'guruh_id']);
    }

    /**
     * Gets query for [[TalabaTuri]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTalabaTuri()
    {
        return $this->hasOne(TalabaTuri::className(), ['id' => 'talaba_turi_id']);
    }

    /**
     * Gets query for [[UqishTuri]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUqishTuri()
    {
        return $this->hasOne(UqishTuri::className(), ['id' => 'uqish_turi_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function upload($image)
    {
        if ($image !== null) {
            $dir = Yii::getAlias('@frontend')."/web/uploads/company/";
            $image_name = "talabalar_".time();
            $image_name .= '.'.$image->extension;
            if ($image->saveAs($dir.$image_name)) {
                $this->image = $image_name;
                return true;
            }
        }

        return false;
    }

}
