<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_cluster".
 *
 * @property integer $cluster_id
 * @property string $cluster
 * @property string $cluster_code
 * @property integer $sub_base_id
 * @property integer $district_id
 * @property integer $state_id
 * @property integer $country_id
 */
class LookupCluster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_cluster';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_base_id', 'district_id', 'state_id','mukim_id','bahagian_id'], 'integer'],
            [['cluster'], 'string', 'max' => 225],
            [['cluster_code'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cluster_id' => 'Cluster ID',
            'cluster' => 'Cluster',
            'cluster_code' => 'Cluster Code',
            'mukim_id' => 'Mukim',
            'sub_base_id' => 'Sub Base',
            'district_id' => 'Daerah',
            'state_id' => 'Negeri',
            'bahagian_id'=>'Bahagian',
            'district' => 'Daerah',
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
    public function getSubBase()
    {
        return $this->hasOne(LookupSubBase::className(), ['sub_base_id' => 'sub_base_id']);
    }
    public function getMukim()
    {
        return $this->hasOne(LookupMukim::className(), ['mukim_id' => 'mukim_id']);
    }
}
