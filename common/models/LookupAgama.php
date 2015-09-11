<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_agama".
 *
 * @property integer $id
 * @property string $agama
 */
class LookupAgama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agama'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agama' => 'Agama',
        ];
    }
}
