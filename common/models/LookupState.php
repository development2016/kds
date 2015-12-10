<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_state".
 *
 * @property integer $state_id
 * @property string $state
 * @property string $state_code
 * @property integer $country_id
 * @property string $flag
 */
class LookupState extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['state'], 'string', 'max' => 225],
            [['flag','kawasan_perlaksanaan'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'state' => 'Negeri',
            'flag' => 'Flag',
            'kawasan_perlaksanaan' => 'kp',
        ];
    }
}
