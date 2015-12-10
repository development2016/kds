<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "acl_data_filter".
 *
 * @property integer $filter_id
 * @property string $data_state
 * @property integer $role_menu_id
 */
class AclDataFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acl_data_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_menu_id'], 'integer'],
            [['data_state'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => 'Filter ID',
            'data_state' => 'Data State',
            'role_menu_id' => 'Role Menu ID',
        ];
    }
}
