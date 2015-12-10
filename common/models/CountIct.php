<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "count_ict".
 *
 * @property integer $id
 * @property integer $q_21
 * @property integer $q_22
 * @property integer $q_23
 * @property integer $q_24
 * @property integer $q_25
 * @property integer $state_id
 * @property string $last_update
 */
class CountIct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'count_ict';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q_21', 'q_22', 'q_23', 'q_24', 'q_25', 'state_id'], 'integer'],
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
            'q_21' => 'Q 21',
            'q_22' => 'Q 22',
            'q_23' => 'Q 23',
            'q_24' => 'Q 24',
            'q_25' => 'Q 25',
            'state_id' => 'State ID',
            'last_update' => 'Last Update',
        ];
    }
}
