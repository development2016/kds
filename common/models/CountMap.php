<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "count_map".
 *
 * @property integer $id
 * @property integer $count_state
 * @property integer $state_id
 */
class CountMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'count_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count_state', 'state_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
    
            'count_state' => 'Count State',
            'state_id' => 'State ID',
        ];
    }
}
