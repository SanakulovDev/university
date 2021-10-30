<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "po".
 *
 * @property int $id
 * @property int $po_no
 * @property string $description
 *
 * @property PoItem[] $poItems
 */
class Po extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'po';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['po_no', 'description'], 'required'],
            [['po_no'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'po_no' => Yii::t('app', 'Po No'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[PoItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoItems()
    {
        return $this->hasMany(PoItem::className(), ['po_id' => 'id']);
    }
}
