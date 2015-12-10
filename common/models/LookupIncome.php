<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_income".
 *
 * @property integer $id
 * @property string $income
 */
class LookupIncome extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_income';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['income'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'income' => 'Income',
        ];
    }
}
