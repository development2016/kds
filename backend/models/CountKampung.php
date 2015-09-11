<?php

namespace backend\models;

use Yii;
use common\models\LookupKampung;

/**
 * This is the model class for table "count_kampung".
 *
 * @property integer $id
 * @property integer $ict
 * @property integer $kesihatan
 * @property integer $pendidikan
 * @property integer $keusahawanan
 * @property integer $riadah
 * @property integer $kampung_id
 * @property string $cluster_id
 * @property integer $sub_base_id
 * @property integer $district_id
 * @property integer $state_id
 * @property string $last_update
 */
class CountKampung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'count_kampung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ict', 'kesihatan', 'pendidikan', 'keusahawanan', 'riadah', 'kampung_id', 'cluster_id', 'sub_base_id', 'district_id', 'state_id','mukim_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ict' => 'Ict',
            'kesihatan' => 'Kesihatan',
            'pendidikan' => 'Pendidikan',
            'keusahawanan' => 'Keusahawanan',
            'riadah' => 'Riadah',
            'mukim_id' => 'Mukim',
            'kampung_id' => 'Kampung ID',
            'cluster_id' => 'Cluster ID',
            'sub_base_id' => 'Sub Base ID',
            'district_id' => 'District ID',
            'state_id' => 'State ID',
            'last_update' => 'Last Update',
        ];
    }
            public function getKampung()
    {
        return $this->hasOne(LookupKampung::className(), ['kampung_id' => 'kampung_id']);
    }
}
