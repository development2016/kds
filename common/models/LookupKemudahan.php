<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_kemudahan".
 *
 * @property integer $id
 * @property string $kemudahan_awam
 */
class LookupKemudahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_kemudahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kemudahan_awam'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kemudahan_awam' => 'Kemudahan Awam',
        ];
    }
}
