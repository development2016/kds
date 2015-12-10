<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_bilangan_rumah".
 *
 * @property integer $id
 * @property string $bil_rumah
 */
class LookupBilanganRumah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_bilangan_rumah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bil_rumah'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bil_rumah' => 'Bil Rumah',
        ];
    }
}
