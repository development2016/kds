<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "count_mukim".
 *
 * @property integer $id
 * @property integer $ict
 * @property integer $kesihatan
 * @property integer $pendidikan
 * @property integer $keusahawanan
 * @property integer $riadah
 * @property integer $mukim_id
 * @property integer $district_id
 * @property integer $state_id
 * @property string $last_update
 */
class CountMukim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'count_mukim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ict', 'kesihatan', 'pendidikan', 'keusahawanan', 'riadah', 'mukim_id', 'district_id', 'state_id'], 'integer'],
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
            'mukim_id' => 'Mukim ID',
            'district_id' => 'District ID',
            'state_id' => 'State ID',
            'last_update' => 'Last Update',
        ];
    }
}
