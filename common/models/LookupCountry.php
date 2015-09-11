<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_country".
 *
 * @property integer $country_id
 * @property string $country
 * @property string $country_code
 * @property string $desc
 * @property string $flag
 */
class LookupCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country'], 'string', 'max' => 225],
            [['country_code', 'desc', 'flag'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'country' => 'Negara',
            'country_code' => 'Country Code',
            'desc' => 'Desc',
            'flag' => 'Bendera',
        ];
    }
}
