<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lookup_menu".
 *
 * @property integer $menu_id
 * @property string $menu
 */
class LookupMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'menu' => 'Menu',
        ];
    }
}
