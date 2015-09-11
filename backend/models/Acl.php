<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "acl".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 * @property string $menu
 * @property string $data
 */
class Acl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id','state_id','district_id','mukim_id','kampung_id'], 'integer'],
  
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Pengguna',
            'role_id' => 'Role',
         
        ];
    }
}
