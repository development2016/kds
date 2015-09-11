<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pfn_equip".
 *
 * @property integer $equip_id
 * @property integer $pfn_id
 * @property string $equip_name
 * @property integer $quantity
 * @property string $condition
 */
class PfnEquip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pfn_equip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pfn_id', 'quantity'], 'integer'],
            [['equip_name'], 'string', 'max' => 225],
            [['condition'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equip_id' => 'Equip ID',
            'pfn_id' => 'Pfn ID',
            'equip_name' => 'Peralatan',
            'quantity' => 'Bilangan',
            'condition' => 'Keadaan',
        ];
    }
    public function getPfn()
    {
        return $this->hasOne(Pfn::className(), ['pfn_id' => 'pfn_id']);
    }
    
}
