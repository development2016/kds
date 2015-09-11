<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_edu_level".
 *
 * @property integer $id
 * @property string $edu_level
 */
class LookupEduLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_edu_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_level'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'edu_level' => 'Edu Level',
        ];
    }
}
