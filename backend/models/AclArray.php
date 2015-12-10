<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "acl_array".
 *
 * @property integer $id
 * @property string $data_state
 * @property integer $acl_id
 */
class AclArray extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acl_array';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acl_id'], 'integer'],
            [['data_state'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'acl_array_id' => 'ID',
            'data_state' => 'Data State',
            'acl_id' => 'Acl ID',
        ];
    }
}
