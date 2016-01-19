<?php

namespace common\models;

use Yii;
use common\models\LookupState;

/**
 * This is the model class for table "lookup_district".
 *
 * @property integer $district_id
 * @property string $district
 * @property string $district_code
 * @property string $state_id
 * @property integer $country_id
 */
class LookupDistrict extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district'], 'string', 'max' => 225],
            [['district_code', 'state_id','bahagian_id'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'district_id' => 'District ID',
            'district' => 'Daerah',
            'district_code' => 'District Code',
            'bahagian_id' => 'Bahagian',
            'state_id' => 'Negeri',
        ];
    }

    public function getStatejoin()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_id']);
    }

    public function getState()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_id']);
    }
    public function getBahagians()
    {
        return $this->hasOne(LookupBahagian::className(), ['bahagian_id' => 'bahagian_id']);
    }
}
