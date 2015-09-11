<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_bangsa".
 *
 * @property integer $id
 * @property string $bangsa
 */
class LookupBangsa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_bangsa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bangsa'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bangsa' => 'Bangsa',
        ];
    }
}
