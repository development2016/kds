<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_spending".
 *
 * @property integer $id
 * @property string $spending
 */
class LookupSpending extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_spending';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spending'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'spending' => 'Spending',
        ];
    }
}
