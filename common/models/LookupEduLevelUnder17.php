<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_edu_level_under_17".
 *
 * @property integer $id
 * @property string $edu_level_under_17
 */
class LookupEduLevelUnder17 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_edu_level_under_17';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_level_under_17'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'edu_level_under_17' => 'Edu Level Under 17',
        ];
    }
}
