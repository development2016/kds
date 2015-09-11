<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_bahasa".
 *
 * @property integer $id
 * @property string $bahasa_melayu_menulis
 * @property string $bahasa_melayu_lisan
 * @property string $bahasa_inggeris_menulis
 * @property string $bahasa_inggeris_lisan
 * @property string $lisan
 * @property string $lain_lain_menulis
 * @property string $lain_lain_lisan
 * @property integer $user_id
 */
class UserBahasa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_bahasa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['bahasa_melayu_menulis', 'bahasa_melayu_lisan', 'bahasa_inggeris_menulis', 'bahasa_inggeris_lisan', 'lain_lain_menulis', 'lain_lain_lisan'], 'string', 'max' => 50],
            [['lain_lain'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bahasa_melayu_menulis' => 'Bahasa Melayu',
            'bahasa_melayu_lisan' => 'Bahasa Melayu Lisan',
            'bahasa_inggeris_menulis' => 'Bahasa Inggeris',
            'bahasa_inggeris_lisan' => 'Bahasa Inggeris Lisan',
            'lain_lain' => 'Lain-lain (Nyatakan)',
            'lain_lain_menulis' => 'Lain Lain Menulis',
            'lain_lain_lisan' => 'Lain Lain Lisan',
            'user_id' => 'User ID',
        ];
    }
}
