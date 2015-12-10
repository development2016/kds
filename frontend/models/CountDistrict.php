<?php

namespace frontend\models;

use Yii;

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
            [['ict', 'kesihatan', 'pendidikan', 'keusahawanan', 'riadah', 'district_id'], 'integer'],
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
            'last_update' => 'Last Update',
        ];
    }
}
