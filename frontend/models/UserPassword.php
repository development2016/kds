<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_password".
 *
 * @property integer $id
 * @property string $password
 * @property integer $user_id
 */
class UserPassword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_password';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['password'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'password' => 'Password',
            'user_id' => 'User ID',
        ];
    }
}
