<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_field".
 *
 * @property integer $field_id
 * @property string $field_name
 */
class LookupField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_name'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'field_id' => 'Field ID',
            'field_name' => 'Field Name',
        ];
    }
}
