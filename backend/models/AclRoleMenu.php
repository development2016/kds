<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "acl_role_menu".
 *
 * @property integer $role_menu_id
 * @property integer $user_id
 * @property integer $role_id
 * @property integer $menu_id
 */
class AclRoleMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acl_role_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id', 'menu_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_menu_id' => 'Role Menu ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
            'menu_id' => 'Menu ID',
        ];
    }
}
