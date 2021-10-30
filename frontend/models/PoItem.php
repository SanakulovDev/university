<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "po_item".
 *
 * @property int $id
 * @property int $po_item_no
 * @property int $quantity
 * @property int $po_id
 *
 * @property Po $po
 */
class PoItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'po_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['po_item_no', 'quantity', 'po_id'], 'required'],
            [['po_item_no', 'quantity', 'po_id'], 'integer'],
            [['po_id'], 'exist', 'skipOnError' => true, 'targetClass' => Po::className(), 'targetAttribute' => ['po_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'po_item_no' => Yii::t('app', 'Po Item No'),
            'quantity' => Yii::t('app', 'Quantity'),
            'po_id' => Yii::t('app', 'Po ID'),
        ];
    }

    /**
     * Gets query for [[Po]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPo()
    {
        return $this->hasOne(Po::className(), ['id' => 'po_id']);
    }
}
