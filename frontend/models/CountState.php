<?php

namespace frontend\models;

use Yii;
use common\models\LookupState;

/**
 * This is the model class for table "count_state".
 *
 * @property integer $id
 * @property integer $ict
 * @property integer $kesihatan
 * @property integer $pendidikan
 * @property integer $keusahawanan
 * @property integer $riadah
 * @property integer $state_id
 * @property string $last_update
 */
class CountState extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'count_state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ict', 'kesihatan', 'pendidikan', 'keusahawanan', 'riadah', 'state_id'], 'integer'],
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
            'ict' => 'Jumlah Minat ICT',
            'kesihatan' => 'Jumlah Minat Kesihatan',
            'pendidikan' => 'Jumlah Minat Pendidikan',
            'keusahawanan' => 'Jumlah Minat Keusahawanan',
            'riadah' => 'Jumlah Minat Riadah/Rekreasi',
            'state_id' => 'State ID',
            'last_update' => 'Last Update',
        ];
    }

        public function getState()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_id']);
    }
}
