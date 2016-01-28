<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_mukim".
 *
 * @property integer $mukim_id
 * @property string $mukim
 * @property integer $district_id
 * @property integer $state_id
 */
class LookupMukim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_mukim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district_id', 'state_id','bahagian_id','mukim_id'], 'integer'],
            [['mukim'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mukim_id' => 'Mukim ID',
            'mukim' => 'Mukim',
            'district_id' => 'Daerah',
            'bahagian_id' => 'Bahagian',
            'state_id' => 'Negeri',
        ];
    }

    public function getState()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_id']);
    }

    public function getDistrict()
    {
        return $this->hasOne(LookupDistrict::className(), ['district_id' => 'district_id']);
    }
    
    public function getBahagians()
    {
        return $this->hasOne(LookupBahagian::className(), ['bahagian_id' => 'bahagian_id']);
    }
}
