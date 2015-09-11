<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "acl_menu".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property integer $acl_id
 */
class AclMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acl_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'acl_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'acl_id' => 'Acl ID',
        ];
    }
}
