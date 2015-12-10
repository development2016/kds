<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_hubungan".
 *
 * @property integer $id
 * @property string $hubungan
 */
class LookupHubungan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_hubungan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hubungan'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hubungan' => 'Hubungan',
        ];
    }
}
