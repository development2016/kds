<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lookup_role".
 *
 * @property integer $role_id
 * @property string $role
 */
class LookupRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role' => 'Role',
        ];
    }
}
