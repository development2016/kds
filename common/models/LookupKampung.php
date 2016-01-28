<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_kampung".
 *
 * @property integer $kampung_id
 * @property string $kampung
 * @property integer $cluster_id
 * @property integer $sub_base_id
 * @property integer $district_id
 * @property integer $state_id
 * @property integer $country_id
 * @property integer $kampcom_id
 */
class LookupKampung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_kampung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cluster_id', 'sub_base_id', 'district_id', 'state_id', 'kampcom_id','mukim_id','bahagian_id'], 'integer'],
            [['kampung'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kampung_id' => 'Kampung',
            'kampung' => 'Kampung',
            'cluster_id' => 'Cluster',
            'mukim_id' => 'Mukim',
            'sub_base_id' => 'Sub Base',
            'district_id' => 'Daerah',
            'state_id' => 'Negeri',
            'kampcom_id' => 'Kampcom',
            'bahagian_id' =>'Bahagian'
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

    public function getDistrict()
    {
        return $this->hasOne(LookupDistrict::className(), ['district_id' => 'district_id']);
    }
    public function getSubBase()
    {
        return $this->hasOne(LookupSubBase::className(), ['sub_base_id' => 'sub_base_id']);
    }
    public function getMukim()
    {
        return $this->hasOne(LookupMukim::className(), ['mukim_id' => 'mukim_id']);
    }
    public function getCluster()
    {
        return $this->hasOne(LookupCluster::className(), ['cluster_id' => 'cluster_id']);
    }

}
