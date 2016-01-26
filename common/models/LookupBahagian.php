<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_bahagian".
 *
 * @property integer $bahagian_id
 * @property string $bahagian
 * @property integer $state_id
 */
class LookupBahagian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_bahagian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id'], 'integer'],
            [['bahagian'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bahagian_id' => 'Bahagian ID',
            'bahagian' => 'Bahagian',
            'state_id' => 'State ID',
        ];
    }
}
