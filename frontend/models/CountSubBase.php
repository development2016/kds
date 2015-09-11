<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "count_sub_base".
 *
 * @property integer $id
 * @property integer $ict
 * @property integer $kesihatan
 * @property integer $pendidikan
 * @property integer $keusahawanan
 * @property integer $riadah
 * @property integer $sub_base_id
 * @property string $district_id
 * @property integer $state_id
 * @property string $last_update
 */
class CountSubBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'count_sub_base';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ict', 'kesihatan', 'pendidikan', 'keusahawanan', 'riadah', 'sub_base_id', 'district_id', 'state_id'], 'integer'],
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
            'sub_base_id' => 'Sub Base ID',
            'district_id' => 'District ID',
            'state_id' => 'State ID',
            'last_update' => 'Last Update',
        ];
    }
}
