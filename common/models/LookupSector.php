<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_sector".
 *
 * @property integer $sector_id
 * @property string $sector_name
 */
class LookupSector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_sector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_name'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sector_id' => 'Sector ID',
            'sector_name' => 'Sector Name',
        ];
    }
}
