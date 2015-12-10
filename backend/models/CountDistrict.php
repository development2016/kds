<?php

namespace backend\models;

use Yii;
use common\models\LookupDistrict;

/**
 * This is the model class for table "count_district".
 *
 * @property integer $id
 * @property integer $ict
 * @property integer $kesihatan
 * @property integer $pendidikan
 * @property integer $keusahawanan
 * @property integer $riadah
 * @property integer $district_id
 * @property integer $state_id
 * @property string $last_update
 */
class CountDistrict extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'count_district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ict', 'kesihatan', 'pendidikan', 'keusahawanan', 'riadah', 'district_id', 'state_id'], 'integer'],
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
            'district_id' => 'District ID',
            'state_id' => 'State ID',
            'last_update' => 'Last Update',
        ];
    }
        public function getDistrict()
    {
        return $this->hasOne(LookupDistrict::className(), ['district_id' => 'district_id']);
    }
}
