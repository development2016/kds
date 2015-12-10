<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_perkahwinan".
 *
 * @property integer $id
 * @property string $status_perkahwinan
 */
class LookupPerkahwinan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_perkahwinan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_perkahwinan'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_perkahwinan' => 'Status Perkahwinan',
        ];
    }
}
